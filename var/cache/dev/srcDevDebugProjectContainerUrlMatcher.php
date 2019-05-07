<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = [];
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), ['HEAD', 'GET'], true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/') {
            $pathinfo = $trimmedPathinfo === $pathinfo ? $pathinfo.'/' : $trimmedPathinfo;
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $pathinfo, array &$allow = [], array &$allowSchemes = []): array
    {
        $allow = $allowSchemes = [];
        $pathinfo = rawurldecode($pathinfo) ?: '/';
        $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/';
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($trimmedPathinfo) {
            default:
                $routes = [
                    '/cuisine' => [['_route' => 'cuisine', '_controller' => 'App\\Controller\\CuisineController::index'], null, null, null, false],
                    '/cuisine/home' => [['_route' => 'cuisine_home', '_controller' => 'App\\Controller\\CuisineController::home'], null, null, null, false],
                    '/cuisine/boites' => [['_route' => 'liste_boites', '_controller' => 'App\\Controller\\CuisineController::listingBoites'], null, null, null, false],
                    '/cuisine/boite/new' => [['_route' => 'new_boite', '_controller' => 'App\\Controller\\CuisineController::creerBoite'], null, null, null, false],
                    '/cuisine/typealiment/new' => [['_route' => 'new_typealiment', '_controller' => 'App\\Controller\\CuisineController::creerTypeAliment'], null, null, null, false],
                    '/cuisine/typealiment' => [['_route' => 'liste_typealiment', '_controller' => 'App\\Controller\\CuisineController::listingTypesAliment'], null, null, null, false],
                    '/cuisine/aliment/new' => [['_route' => 'new_aliment', '_controller' => 'App\\Controller\\CuisineController::creerAliment'], null, null, null, false],
                    '/cuisine/aliment' => [['_route' => 'liste_aliment', '_controller' => 'App\\Controller\\CuisineController::listingAliments'], null, null, null, false],
                    '/cuisine/stockage/new' => [['_route' => 'new_stockage', '_controller' => 'App\\Controller\\CuisineController::creerStockage'], null, null, null, false],
                    '/cuisine/stockage' => [['_route' => 'liste_stockage', '_controller' => 'App\\Controller\\CuisineController::listingStockage'], null, null, null, false],
                    '/cuisine/produit/new' => [['_route' => 'new_produit', '_controller' => 'App\\Controller\\CuisineController::creerProduit'], null, null, null, false],
                    '/cuisine/produit' => [['_route' => 'liste_produit', '_controller' => 'App\\Controller\\CuisineController::listingProduit'], null, null, null, false],
                    '/cuisine/recette/new' => [['_route' => 'new_recette', '_controller' => 'App\\Controller\\CuisineController::creerRecette'], null, null, null, false],
                    '/cuisine/unite/new' => [['_route' => 'new_unite', '_controller' => 'App\\Controller\\CuisineController::creerUnite'], null, null, null, false],
                    '/cuisine/test' => [['_route' => 'test_recette', '_controller' => 'App\\Controller\\CuisineController::test'], null, null, null, false],
                    '/home' => [['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false],
                    '/_profiler' => [['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true],
                    '/_profiler/search' => [['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false],
                    '/_profiler/search_bar' => [['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false],
                    '/_profiler/phpinfo' => [['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false],
                    '/_profiler/open' => [['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false],
                ];

                if (!isset($routes[$trimmedPathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$trimmedPathinfo];
                if ('/' !== $pathinfo && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                    if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                        return $allow = $allowSchemes = [];
                    }
                    break;
                }

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = [
            0 => '{^(?'
                    .'|/cuisine/boite/add/([^/]++)(*:34)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:72)'
                        .'|wdt/([^/]++)(*:91)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:136)'
                                .'|router(*:150)'
                                .'|exception(?'
                                    .'|(*:170)'
                                    .'|\\.css(*:183)'
                                .')'
                            .')'
                            .'|(*:193)'
                        .')'
                    .')'
                .')/?$}sD',
        ];

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = [
                            34 => [['_route' => 'remplir_boite', '_controller' => 'App\\Controller\\CuisineController::remplirBoite'], ['id'], null, null, false, true],
                            72 => [['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true],
                            91 => [['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true],
                            136 => [['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false],
                            150 => [['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false],
                            170 => [['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false],
                            183 => [['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false],
                            193 => [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true],
                        ];

                        list($ret, $vars, $requiredMethods, $requiredSchemes, $hasTrailingSlash, $hasTrailingVar) = $routes[$m];

                        $hasTrailingVar = $trimmedPathinfo !== $pathinfo && $hasTrailingVar;
                        if ('/' !== $pathinfo && !$hasTrailingVar && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                            if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                                return $allow = $allowSchemes = [];
                            }
                            break;
                        }
                        if ($hasTrailingSlash && $hasTrailingVar && preg_match($regex, rtrim($matchedPathinfo, '/') ?: '/', $n) && $m === (int) $n['MARK']) {
                            $matches = $n;
                        }

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (193 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return [];
    }
}
