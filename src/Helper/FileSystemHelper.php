<?php

namespace Helper;

class FileSystemHelper {

    /**
     * @param string $path Folder path
     * @param int $permissions Permissionswe want to apply to the folders
     */
    public function createPathFolders(string $path, int $permissions = 0755)
    {
        if(!is_dir($path)) {
            mkdir($path, $permissions, true);
        }
    }

    /**
     * @param string $content Le contenu textuel à enregistrer dans le fichier
     * @param string $path Le chemin vers le dossier dans lequel on souhaite enregistrer le fichier
     * @param string $extension L'extension du fichier
     * @param string|null $filename Le nom du fichier
     * @return string Le nom du fichier dans lequel on a écrit
     */
    public function createFile(string $content, string $path, string $extension = 'txt', string $filename = null)
    {
        $filename = $filename ?? $this->generateRandomFilename() . '.' . $extension;
        $this->createPathFolders($path);

        if(substr($path, -1, 1) !== '/') {
            $path .= '/';
        }

        $file = fopen($path . $filename, 'w');
        fwrite($file, $content);
        fclose($file);

        return $filename;
    }

    /**
     * @return string
     */
    public function generateRandomFilename()
    {
        return md5(uniqid(rand(), true));
    }
}