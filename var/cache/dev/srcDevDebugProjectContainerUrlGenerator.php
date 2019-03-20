<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'cuisine' => [[], ['_controller' => 'App\\Controller\\CuisineController::index'], [], [['text', '/cuisine']], [], []],
        'liste_boites' => [[], ['_controller' => 'App\\Controller\\CuisineController::listingBoites'], [], [['text', '/cuisine/boites']], [], []],
        'new_boite' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerBoite'], [], [['text', '/cuisine/boite/new']], [], []],
        'remplir_boite' => [['id'], ['_controller' => 'App\\Controller\\CuisineController::remplirBoite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/cuisine/boite/add']], [], []],
        'new_typealiment' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerTypeAliment'], [], [['text', '/cuisine/typealiment/new']], [], []],
        'liste_typealiment' => [[], ['_controller' => 'App\\Controller\\CuisineController::listingTypesAliment'], [], [['text', '/cuisine/typealiment']], [], []],
        'new_aliment' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerAliment'], [], [['text', '/cuisine/aliment/new']], [], []],
        'liste_aliment' => [[], ['_controller' => 'App\\Controller\\CuisineController::listingAliments'], [], [['text', '/cuisine/aliment']], [], []],
        'new_stockage' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerStockage'], [], [['text', '/cuisine/stockage/new']], [], []],
        'liste_stockage' => [[], ['_controller' => 'App\\Controller\\CuisineController::listingStockage'], [], [['text', '/cuisine/stockage']], [], []],
        'new_produit' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerProduit'], [], [['text', '/cuisine/produit/new']], [], []],
        'liste_produit' => [[], ['_controller' => 'App\\Controller\\CuisineController::listingProduit'], [], [['text', '/cuisine/produit']], [], []],
        'new_recette' => [[], ['_controller' => 'App\\Controller\\CuisineController::creerRecette'], [], [['text', '/cuisine/recette/new']], [], []],
        'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], []],
        '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
        '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
        '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
        '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
        '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
        '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
        '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
        '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
        '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
        '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
        '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
        '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && (self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name && null !== $name) {
            unset($parameters['_locale']);
            $name .= '.'.$locale;
        } elseif (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
