<?php

namespace Avatar;

class AvatarMatrix implements AvatarMatrixInterface {

    const DEFAULT_SIZE = 5;
    const DEFAULT_COLORS = ['white', 'black'];

    /**
     * @var array Un tableau contenant les couleurs de l'avatar
     */
    private $colors;

    /**
     * @var int La taille de l'avatar (nombre de pixels de côté)
     */
    private $size;

    /**
     * @var AvatarRendererInterface
     */
    private $pixelAvatarRenderer;

    /**
     * PixelAvatarMatrix constructor.
     * @param AvatarRendererInterface $pixelAvatarRenderer Un objet Moteur de rendu
     */
    public function __construct(AvatarRendererInterface $pixelAvatarRenderer)
    {
        $this->colors = self::DEFAULT_COLORS;
        $this->size = self::DEFAULT_SIZE;
        $this->pixelAvatarRenderer = $pixelAvatarRenderer;
    }

    /**
     * Size setter
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

    /**
     * Size getter
     * @return int La taille de l'avatar
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Colors setter
     * @param array $colors Le tableau de couleurs
     */
    public function setColors(array $colors)
    {
        $this->colors = $colors;
    }

    public function getRandom(): array
    {
        // Initialisation du tableau global
        $matrix = array_fill(0, $this->size, []);

        // On parcours les lignes...
        for ($row = 0; $row < $this->size  ; $row++) {

            // On parcours les colonnes...
            for ($col = 0; $col < $this->size / 2  ; $col++) {

                // On remplit chaque case avec une symétrie axiale verticale
                $randIndex = array_rand($this->colors,1);
                $matrix[$col][$row] = $matrix[$this->size - $col - 1][$row] = $this->colors[$randIndex];
            }

            // On remet les indices de chaque ligne dans l'ordre
             ksort($matrix[$row]);
        }

        // On retourne le tableau global en résultat
        return $matrix;
    }

    /**
     * Génère le rendu de l'avatar
     * @return string Rendu de l'avatar
     */
    public function render(): string
    {
        return $this->pixelAvatarRenderer->render($this);
    }
}