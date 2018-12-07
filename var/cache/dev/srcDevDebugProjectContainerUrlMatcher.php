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
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
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
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo) ?: '/';
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($trimmedPathinfo = '/' !== $pathinfo && '/' === $pathinfo[-1] ? substr($pathinfo, 0, -1) : $pathinfo) {
            default:
                $routes = array(
                    '/cuisine' => array(array('_route' => 'cuisine', '_controller' => 'App\\Controller\\CuisineController::index'), null, null, null, false),
                    '/cuisine/boites' => array(array('_route' => 'liste_boites', '_controller' => 'App\\Controller\\CuisineController::listingBoites'), null, null, null, false),
                    '/cuisine/boite/new' => array(array('_route' => 'new_boite', '_controller' => 'App\\Controller\\CuisineController::creerBoite'), null, null, null, false),
                    '/cuisine/typealiment/new' => array(array('_route' => 'new_typealiment', '_controller' => 'App\\Controller\\CuisineController::creerTypeAliment'), null, null, null, false),
                    '/cuisine/typealiment' => array(array('_route' => 'liste_typealiment', '_controller' => 'App\\Controller\\CuisineController::listingTypesAliment'), null, null, null, false),
                    '/cuisine/aliment/new' => array(array('_route' => 'new_aliment', '_controller' => 'App\\Controller\\CuisineController::creerAliment'), null, null, null, false),
                    '/cuisine/aliment' => array(array('_route' => 'liste_aliment', '_controller' => 'App\\Controller\\CuisineController::listingAliments'), null, null, null, false),
                    '/cuisine/stockage/new' => array(array('_route' => 'new_stockage', '_controller' => 'App\\Controller\\CuisineController::creerStockage'), null, null, null, false),
                    '/cuisine/stockage' => array(array('_route' => 'liste_stockage', '_controller' => 'App\\Controller\\CuisineController::listingStockage'), null, null, null, false),
                    '/cuisine/produit/new' => array(array('_route' => 'new_produit', '_controller' => 'App\\Controller\\CuisineController::creerProduit'), null, null, null, false),
                    '/cuisine/produit' => array(array('_route' => 'liste_produit', '_controller' => 'App\\Controller\\CuisineController::listingProduit'), null, null, null, false),
                    '/cuisine/recette/new' => array(array('_route' => 'new_recette', '_controller' => 'App\\Controller\\CuisineController::creerRecette'), null, null, null, false),
                    '/_profiler' => array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true),
                    '/_profiler/search' => array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false),
                    '/_profiler/search_bar' => array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false),
                    '/_profiler/phpinfo' => array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false),
                    '/_profiler/open' => array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false),
                );

                if (!isset($routes[$trimmedPathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$trimmedPathinfo];

                if ('/' !== $pathinfo) {
                    if ($hasTrailingSlash !== ('/' === $pathinfo[-1])) {
                        if ((!$requiredMethods || isset($requiredMethods['GET'])) && 'GET' === $canonicalMethod) {
                            return $allow = $allowSchemes = array();
                        }
                        break;
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

        $matchedPathinfo = $pathinfo;
        $regexList = array(
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
                .')(?:/?)$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = array(
                            34 => array(array('_route' => 'remplir_boite', '_controller' => 'App\\Controller\\CuisineController::remplirBoite'), array('id'), null, null, false),
                            72 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false),
                            91 => array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false),
                            136 => array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false),
                            150 => array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false),
                            170 => array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false),
                            183 => array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false),
                            193 => array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$m];

                        if ('/' !== $pathinfo) {
                            if ('/' === $pathinfo[-1]) {
                                if (preg_match($regex, substr($pathinfo, 0, -1), $n) && $m === (int) $n['MARK']) {
                                    $matches = $n;
                                } else {
                                    $hasTrailingSlash = true;
                                }
                            }

                            if ($hasTrailingSlash !== ('/' === $pathinfo[-1])) {
                                if ((!$requiredMethods || isset($requiredMethods['GET'])) && 'GET' === $canonicalMethod) {
                                    return $allow = $allowSchemes = array();
                                }
                                break;
                            }
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

        return array();
    }
}
