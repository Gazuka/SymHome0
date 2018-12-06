<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.registry' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormRegistryInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormRegistry.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormExtensionInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DependencyInjection\\DependencyInjectionExtension.php';

return $this->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\ServiceLocator(array('App\\Form\\AlimentType' => function () {
    return ($this->privates['App\Form\AlimentType'] ?? $this->privates['App\Form\AlimentType'] = new \App\Form\AlimentType());
}, 'App\\Form\\BoiteType' => function () {
    return ($this->privates['App\Form\BoiteType'] ?? $this->privates['App\Form\BoiteType'] = new \App\Form\BoiteType());
}, 'App\\Form\\EtapeType' => function () {
    return ($this->privates['App\Form\EtapeType'] ?? $this->privates['App\Form\EtapeType'] = new \App\Form\EtapeType());
}, 'App\\Form\\IngredientType' => function () {
    return ($this->privates['App\Form\IngredientType'] ?? $this->privates['App\Form\IngredientType'] = new \App\Form\IngredientType());
}, 'App\\Form\\ProduitType' => function () {
    return ($this->privates['App\Form\ProduitType'] ?? $this->privates['App\Form\ProduitType'] = new \App\Form\ProduitType());
}, 'App\\Form\\RecetteType' => function () {
    return ($this->privates['App\Form\RecetteType'] ?? $this->privates['App\Form\RecetteType'] = new \App\Form\RecetteType());
}, 'App\\Form\\StockageType' => function () {
    return ($this->privates['App\Form\StockageType'] ?? $this->privates['App\Form\StockageType'] = new \App\Form\StockageType());
}, 'App\\Form\\TypeAlimentType' => function () {
    return ($this->privates['App\Form\TypeAlimentType'] ?? $this->privates['App\Form\TypeAlimentType'] = new \App\Form\TypeAlimentType());
}, 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => function () {
    return ($this->privates['form.type.entity'] ?? $this->load('getForm_Type_EntityService.php'));
}, 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => function () {
    return ($this->privates['form.type.choice'] ?? $this->load('getForm_Type_ChoiceService.php'));
}, 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => function () {
    return ($this->privates['form.type.form'] ?? $this->load('getForm_Type_FormService.php'));
})), array('Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.form.http_foundation'] ?? $this->load('getForm_TypeExtension_Form_HttpFoundationService.php'));
    yield 1 => ($this->privates['form.type_extension.form.validator'] ?? $this->load('getForm_TypeExtension_Form_ValidatorService.php'));
    yield 2 => ($this->privates['form.type_extension.upload.validator'] ?? $this->load('getForm_TypeExtension_Upload_ValidatorService.php'));
    yield 3 => ($this->privates['form.type_extension.csrf'] ?? $this->load('getForm_TypeExtension_CsrfService.php'));
    yield 4 => ($this->privates['form.type_extension.form.data_collector'] ?? $this->load('getForm_TypeExtension_Form_DataCollectorService.php'));
}, 5), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.repeated.validator'] ?? $this->privates['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension());
}, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.submit.validator'] ?? $this->privates['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension());
}, 1)), new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_guesser.validator'] ?? $this->load('getForm_TypeGuesser_ValidatorService.php'));
    yield 1 => ($this->privates['form.type_guesser.doctrine'] ?? $this->load('getForm_TypeGuesser_DoctrineService.php'));
}, 2))), ($this->privates['form.resolved_type_factory'] ?? $this->load('getForm_ResolvedTypeFactoryService.php')));
