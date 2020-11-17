<?php

namespace Avatar;

use Helper\ColorTools;

/**
 * Class SvgPixelAvatarFactory
 * Usine à fabriquer des avatars
 */
class SvgAvatarFactory {

    /**
     * @param int $size La taille de l'avatar
     * @param int $numberOfColors Le nombre de couleurs différentes de l'avatar
     * @return AvatarMatrix
     */
    static public function getRandomMatrix(int $size = 5, int $numberOfColors = 2): AvatarMatrix
    {
        // Création d'un objet SvgMatrixRenderer, en paramètre du constructeur le chemin vers le fichier de template SVG
        $renderer = new SvgMatrixRenderer(TEMPLATES_DIR . '/avatar.svg.tpl');

        // Création de la matrice de l'avatar avec injection de l'objet Moteur de rendu
        $matrix = new AvatarMatrix($renderer);
        $matrix->setSize($size);

        // Génération d'un tableau de couleurs aléatoires
        $colors = array_map(function() {
            return ColorTools::getRandomColor();
        }, array_fill(0, $numberOfColors, null));

        $matrix->setColors($colors);

        return $matrix;
    }
}