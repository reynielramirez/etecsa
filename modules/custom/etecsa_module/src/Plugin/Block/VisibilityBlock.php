<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'VisibilityBlock' block.
 *
 * @Block(
 *  id = "visibility_block",
 *  admin_label = @Translation("Visibility block"),
 * )
 */
class VisibilityBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'visibility' => [
          'mobile' => [
            'title' => $this->t('Movil'),
            'people' => '',
            'companies' => '',
            'entrepreneurs' => '',
            'visitors' => '',
          ],
          'tablet' => [
            'title' => $this->t('Tableta'),
            'people' => '',
            'companies' => '',
            'entrepreneurs' => '',
            'visitors' => '',
          ],
          'desktop' => [
            'title' => $this->t('Escritorio'),
            'people' => '',
            'companies' => '',
            'entrepreneurs' => '',
            'visitors' => '',
          ],
        ],
      ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $form['visibility'] = [
      '#type' => 'details',
      '#title' => $this->t('Visibilidad de los bloques'),
      '#open' => TRUE,
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        'screen' => $this->t('Pantalla'),
        'people' => $this->t('Personas'),
        'companies' => $this->t('Empresas'),
        'entrepreneurs' => $this->t('Emprendedores'),
        'visitors' => $this->t('Visitantes'),
      ],
    ];

    foreach ($this->configuration["visibility"] as $key => $field) {
        $table[$key]['field'] = [
          '#plain_text' => $field['title'],
        ];

        $table[$key]['people'] = [
          '#type' => 'checkbox',
          '#title_display' => 'invisible',
          '#default_value' => $field['people'],
        ];
        $table[$key]['companies'] = [
          '#type' => 'checkbox',
          '#title_display' => 'invisible',
          '#default_value' => $field['companies'],
        ];
        $table[$key]['entrepreneurs'] = [
          '#type' => 'checkbox',
          '#title_display' => 'invisible',
          '#default_value' => $field['entrepreneurs'],
        ];
        $table[$key]['visitors'] = [
          '#type' => 'checkbox',
          '#title_display' => 'invisible',
          '#default_value' => $field['visitors'],
        ];
        
      }
    $form['visibility']['table'] = $table;
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
      $this->configuration['visibility'] = $form_state->getValue('visibility')['table'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [];
  }
  
  /**
   * Get Visibility
   *
   * @return array
   **/
  public function getVisibility() {
    return $this->configuration['visibility'];
  }

}
