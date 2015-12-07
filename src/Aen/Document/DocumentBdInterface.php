<?php

namespace Aen\Document;

interface DocumentBdInterface
{
    public static function liste();
    public static function lire($id);
    public static function enregistrer($objet);
    public static function modifier($objet);
    public static function supprimer($id);
}
