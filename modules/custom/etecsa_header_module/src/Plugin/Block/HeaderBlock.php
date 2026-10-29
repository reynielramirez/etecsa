<?php
namespace Drupal\etecsa_header_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 * 	 id = "etecsa_header_block",
 * 	 admin_label = @Translation("Header Block of etecsa site")
 * )
 */
class HeaderBlock extends BlockBase{
	/**
	 * {@inheritdoc}
	 */
	public function build(){

    $atencion = "";
    $sobrenos = "";
    $siguenos = "";

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();

    if( $language === "es" || $language === $default_laguagecode )
		{
		  	$atencion = "Atención al cliente";
			$sobrenos = "Sobre nosotros";
			$siguenos = "Síguenos";
			$etecsa="Empresa de Telecomunicaciones de Cuba S.A";
			$lan = "es";
		}

		if( $language === "en" ){
			$atencion = "Customer Care";
			$sobrenos = "About us";
			$siguenos = "Follow us";
			$etecsa="Telecommunications Company of Cuba S.A";
			$lan = "en";
		}

		$contacto = array();
    	$redesSociales = array();

		$resultCont = Drupal::entityQuery('node')->accessCheck(FALSE)			->condition('type','etecsa')
			->condition('langcode',$lan)
			->execute();

    	$resultredes = Drupal::entityQuery('node')->accessCheck(FALSE)        ->condition('type','enlaces_redes_sociales')
        ->condition('langcode',$lan)
        ->execute();

        if(!empty($resultCont)){
            foreach ($resultCont as $contId){
				$contac = \Drupal::entityTypeManager()->getStorage('node')->load($contId);
                $contacto[]=$contac->getTranslation($lan);
            }
        }

        if(!empty($resultredes)){
            foreach ($resultredes as $redesId){
                $redsocial = \Drupal::entityTypeManager()->getStorage('node')->load($redesId);
                $redesSociales[]=$redsocial->getTranslation($lan);
            }
        }

        $library['library'][]= 'etecsa_header_module/etecsa-header-styling';

		return [
			'#theme' => 'etecsa_header',
			'#titulo' => 'Bloque para el header de etecsa',
			'#descripcion' => 'En este bloque podra acceder a las redes sociales y enlaces de interes.',
			'#siguenos'=>$this->t($siguenos),
			'#sobrenos'=>$this->t($sobrenos),
			'#etecsa'=>$this->t($etecsa),
			'#atencion'=>$this->t($atencion),
			'#data'=>$contacto,
      		'#data2'=>$redesSociales,
			'#attached'=>$library,
			];
	}
}
?>
