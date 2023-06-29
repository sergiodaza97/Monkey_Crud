<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $arrayTypeDocuments = [
             "Document1" => array(
                "description" => "Registro Civil",
             ),
             "Document2" => array(
                 "description" => "Tarjeta de Identidad",
             ),
             "Document3" => array(
                "description" => "Cédula de Ciudadanía",
            ),
            "Document4" => array(
                "description" => "Cédula de Extranjeria",
            ),
             
         ];
         foreach ($arrayTypeDocuments as $Document){
             $typeDocumentAdd = new Document();
             if (is_array($Document)) {
                 foreach ($Document as $key => $value){
                     $typeDocumentAdd -> $key = $value;
                 }
                 $typeDocumentAdd -> save();
             }
         }
     }
}
