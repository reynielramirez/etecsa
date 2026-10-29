<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\Annotation\Block;
use Drupal;

/**
 * @Block(
 *   id = "roaming_clasification_block",
 *   admin_label = @Translation("Roaming por Clasificación"),
 * )
 */
class RoamingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'clasificacion' => NULL,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['clasificacion'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Clasificación de roaming'),
      '#target_type' => 'taxonomy_term',
      '#selection_settings' => [
        'target_bundles' => ['tipos_de_clientes'],
      ],
      '#required' => TRUE,
      '#default_value' => $this->configuration['clasificacion']
        ? Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($this->configuration['clasificacion'])
        : NULL,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['clasificacion'] = $form_state->getValue('clasificacion');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $request = Drupal::request();
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $lan = ($language === 'en') ? 'en' : 'es';

    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_visitantes_module\Form\PaisFiltroForm');

    $clasificacion_tid = $this->configuration['clasificacion'];
    $termPaistId = $request->query->get('pais');

    $result = [];
    $cant = [];
    $bandera = !empty($termPaistId);

    /** =============================
     *  Obtener países habilitados
     *  =============================
     */
    $manager = Drupal::entityTypeManager()->getStorage('taxonomy_term');
    $paises = $manager->loadTree('paises', 0, 1, TRUE);

    $idsPais = [];
    $paisesR = [];

    foreach ($paises as $term) {
      if (empty($manager->loadParents($term->id())) && $term->get('field_destacado')->value == 1) {
        $translated = Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
        $paisesR[] = $translated->getName();
        $idsPais[] = $term->id();
      }
    }

    /** =============================
     *  Query principal de roaming
     *  =============================
     */
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'operador_roaming')
      ->condition('status', 1)
      ->condition('langcode', $lan)
      ->condition('field_clasificacion', $clasificacion_tid);

    if ($termPaistId) {
      $query->condition('field_pais', $termPaistId);
    }
    else {
      $query->condition('field_pais', $idsPais, 'IN');
    }

    $nids = $query->execute();

    if ($nids) {
      $nodes = Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

      foreach ($nodes as $node) {
        $pais = $etecsaService->getTaxTermById($node->get('field_pais')->target_id);
        $operador = $etecsaService->getTaxTermById($node->get('field_operador')->target_id);

        if ($operador) {
          $operador = Drupal::service('entity.repository')
            ->getTranslationFromContext($operador, $lan);
        }

        $pais_name = $pais->name->value;

        $result[$pais_name][] = [
          'servicios' => $node->getTranslation($lan)->get('field_servicios')->value,
          'enlace' => $node->getTranslation($lan)->get('field_enlace_operador')->value,
          'operador' => $operador->name->value,
        ];

        $cant[$pais_name] = isset($cant[$pais_name])
          ? $cant[$pais_name] + 1
          : 1;
      }
    }

    return [
      '#theme' => 'roaming',
      '#data' => $result,
      '#form' => $form,
      '#countEspacios' => $cant,
      '#bandera' => $bandera,
      '#cache' => [
        'contexts' => ['url.query_args:pais', 'languages'],
      ],
    ];
  }

}
