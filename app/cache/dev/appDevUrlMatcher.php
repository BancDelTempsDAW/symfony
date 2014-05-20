<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // bonavall_bancdeltemps_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'bonavall_bancdeltemps_homepage')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\DefaultController::indexAction',));
        }

        // bonavall_bancdeltemps_inici
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'bonavall_bancdeltemps_inici');
            }

            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'bonavall_bancdeltemps_inici',);
        }

        // bonavall_bancdeltemps_user
        if ($pathinfo === '/user') {
            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\DefaultController::userAction',  '_route' => 'bonavall_bancdeltemps_user',);
        }

        // bonavall_bancdeltemps_admin
        if (rtrim($pathinfo, '/') === '/admin') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'bonavall_bancdeltemps_admin');
            }

            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\DefaultController::adminAction',  '_route' => 'bonavall_bancdeltemps_admin',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/persona')) {
                // persona
                if (rtrim($pathinfo, '/') === '/admin/persona') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'persona');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::indexAction',  '_route' => 'persona',);
                }

                // persona_create
                if ($pathinfo === '/admin/persona/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::createAction',  '_route' => 'persona_create',);
                }

                // persona_update
                if (0 === strpos($pathinfo, '/admin/persona/update') && preg_match('#^/admin/persona/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'persona_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::updateAction',));
                }

                // persona_show
                if (0 === strpos($pathinfo, '/admin/persona/show') && preg_match('#^/admin/persona/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'persona_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::showAction',));
                }

                // persona_edit
                if (0 === strpos($pathinfo, '/admin/persona/edit') && preg_match('#^/admin/persona/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'persona_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::editAction',));
                }

                // persona_new
                if ($pathinfo === '/admin/persona/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::newAction',  '_route' => 'persona_new',);
                }

                // persona_delete
                if (0 === strpos($pathinfo, '/admin/persona/delete') && preg_match('#^/admin/persona/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'persona_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PersonaController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/usuari')) {
                // usuari
                if (rtrim($pathinfo, '/') === '/admin/usuari') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usuari');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::indexAction',  '_route' => 'usuari',);
                }

                // usuari_create
                if ($pathinfo === '/admin/usuari/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::createAction',  '_route' => 'usuari_create',);
                }

                // usuari_update
                if (0 === strpos($pathinfo, '/admin/usuari/update') && preg_match('#^/admin/usuari/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuari_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::updateAction',));
                }

                // usuari_show
                if (0 === strpos($pathinfo, '/admin/usuari/show') && preg_match('#^/admin/usuari/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuari_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::showAction',));
                }

                // usuari_edit
                if (0 === strpos($pathinfo, '/admin/usuari/edit') && preg_match('#^/admin/usuari/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuari_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::editAction',));
                }

                // usuari_new
                if ($pathinfo === '/admin/usuari/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::newAction',  '_route' => 'usuari_new',);
                }

                // usuari_delete
                if (0 === strpos($pathinfo, '/admin/usuari/delete') && preg_match('#^/admin/usuari/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuari_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/bancdeltemps')) {
                // Admin_bancdeltemps
                if (rtrim($pathinfo, '/') === '/admin/bancdeltemps') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Admin_bancdeltemps');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::indexAction',  '_route' => 'Admin_bancdeltemps',);
                }

                // Admin_bancdeltemps_create
                if ($pathinfo === '/admin/bancdeltemps/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::createAction',  '_route' => 'Admin_bancdeltemps_create',);
                }

                // Admin_bancdeltemps_update
                if (0 === strpos($pathinfo, '/admin/bancdeltemps/update') && preg_match('#^/admin/bancdeltemps/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Admin_bancdeltemps_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::updateAction',));
                }

                // Admin_bancdeltemps_show
                if (0 === strpos($pathinfo, '/admin/bancdeltemps/show') && preg_match('#^/admin/bancdeltemps/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Admin_bancdeltemps_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::showAction',));
                }

                // Admin_bancdeltemps_edit
                if (0 === strpos($pathinfo, '/admin/bancdeltemps/edit') && preg_match('#^/admin/bancdeltemps/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Admin_bancdeltemps_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::editAction',));
                }

                // Admin_bancdeltemps_new
                if ($pathinfo === '/admin/bancdeltemps/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::newAction',  '_route' => 'Admin_bancdeltemps_new',);
                }

                // Admin_bancdeltemps_delete
                if (0 === strpos($pathinfo, '/admin/bancdeltemps/delete') && preg_match('#^/admin/bancdeltemps/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Admin_bancdeltemps_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\BancdeltempsController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/serveis')) {
                // admin_serveis
                if (rtrim($pathinfo, '/') === '/admin/serveis') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_serveis');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::indexAction',  '_route' => 'admin_serveis',);
                }

                // admin_serveis_create
                if ($pathinfo === '/admin/serveis/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::createAction',  '_route' => 'admin_serveis_create',);
                }

                // admin_serveis_update
                if (0 === strpos($pathinfo, '/admin/serveis/update') && preg_match('#^/admin/serveis/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveis_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::updateAction',));
                }

                // admin_serveis_show
                if (0 === strpos($pathinfo, '/admin/serveis/show') && preg_match('#^/admin/serveis/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveis_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::showAction',));
                }

                // admin_serveis_edit
                if (0 === strpos($pathinfo, '/admin/serveis/edit') && preg_match('#^/admin/serveis/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveis_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::editAction',));
                }

                // admin_serveis_new
                if ($pathinfo === '/admin/serveis/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::newAction',  '_route' => 'admin_serveis_new',);
                }

                // admin_serveis_delete
                if (0 === strpos($pathinfo, '/admin/serveis/delete') && preg_match('#^/admin/serveis/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveis_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/tipusservei')) {
                // admin_tipusservei
                if (rtrim($pathinfo, '/') === '/admin/tipusservei') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_tipusservei');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::indexAction',  '_route' => 'admin_tipusservei',);
                }

                // admin_tipusservei_create
                if ($pathinfo === '/admin/tipusservei/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::createAction',  '_route' => 'admin_tipusservei_create',);
                }

                // admin_tipusservei_update
                if (0 === strpos($pathinfo, '/admin/tipusservei/update') && preg_match('#^/admin/tipusservei/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tipusservei_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::updateAction',));
                }

                // admin_tipusservei_show
                if (0 === strpos($pathinfo, '/admin/tipusservei/show') && preg_match('#^/admin/tipusservei/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tipusservei_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::showAction',));
                }

                // admin_tipusservei_edit
                if (0 === strpos($pathinfo, '/admin/tipusservei/edit') && preg_match('#^/admin/tipusservei/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tipusservei_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::editAction',));
                }

                // admin_tipusservei_new
                if ($pathinfo === '/admin/tipusservei/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::newAction',  '_route' => 'admin_tipusservei_new',);
                }

                // admin_tipusservei_delete
                if (0 === strpos($pathinfo, '/admin/tipusservei/delete') && preg_match('#^/admin/tipusservei/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tipusservei_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\TipusServeiController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/estatservei')) {
                // admin_estatservei
                if (rtrim($pathinfo, '/') === '/admin/estatservei') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_estatservei');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::indexAction',  '_route' => 'admin_estatservei',);
                }

                // admin_estatservei_create
                if ($pathinfo === '/admin/estatservei/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::createAction',  '_route' => 'admin_estatservei_create',);
                }

                // admin_estatservei_update
                if (0 === strpos($pathinfo, '/admin/estatservei/update') && preg_match('#^/admin/estatservei/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_estatservei_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::updateAction',));
                }

                // admin_estatservei_show
                if (0 === strpos($pathinfo, '/admin/estatservei/show') && preg_match('#^/admin/estatservei/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_estatservei_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::showAction',));
                }

                // admin_estatservei_edit
                if (0 === strpos($pathinfo, '/admin/estatservei/edit') && preg_match('#^/admin/estatservei/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_estatservei_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::editAction',));
                }

                // admin_estatservei_new
                if ($pathinfo === '/admin/estatservei/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::newAction',  '_route' => 'admin_estatservei_new',);
                }

                // admin_estatservei_delete
                if (0 === strpos($pathinfo, '/admin/estatservei/delete') && preg_match('#^/admin/estatservei/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_estatservei_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\EstatServeiController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                if (0 === strpos($pathinfo, '/admin/poblacion')) {
                    // admin_poblacion
                    if (rtrim($pathinfo, '/') === '/admin/poblacion') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_poblacion');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::indexAction',  '_route' => 'admin_poblacion',);
                    }

                    // admin_poblacion_create
                    if ($pathinfo === '/admin/poblacion/create') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::createAction',  '_route' => 'admin_poblacion_create',);
                    }

                    // admin_poblacion_update
                    if (0 === strpos($pathinfo, '/admin/poblacion/update') && preg_match('#^/admin/poblacion/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_poblacion_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::updateAction',));
                    }

                    // admin_poblacion_show
                    if (0 === strpos($pathinfo, '/admin/poblacion/show') && preg_match('#^/admin/poblacion/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_poblacion_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::showAction',));
                    }

                    // admin_poblacion_edit
                    if (0 === strpos($pathinfo, '/admin/poblacion/edit') && preg_match('#^/admin/poblacion/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_poblacion_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::editAction',));
                    }

                    // admin_poblacion_new
                    if ($pathinfo === '/admin/poblacion/new') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::newAction',  '_route' => 'admin_poblacion_new',);
                    }

                    // admin_poblacion_delete
                    if (0 === strpos($pathinfo, '/admin/poblacion/delete') && preg_match('#^/admin/poblacion/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_poblacion_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\PoblacionController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/provincia')) {
                    // admin_provincia
                    if (rtrim($pathinfo, '/') === '/admin/provincia') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_provincia');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::indexAction',  '_route' => 'admin_provincia',);
                    }

                    // admin_provincia_create
                    if ($pathinfo === '/admin/provincia/create') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::createAction',  '_route' => 'admin_provincia_create',);
                    }

                    // admin_provincia_update
                    if (0 === strpos($pathinfo, '/admin/provincia/update') && preg_match('#^/admin/provincia/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_provincia_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::updateAction',));
                    }

                    // admin_provincia_show
                    if (0 === strpos($pathinfo, '/admin/provincia/show') && preg_match('#^/admin/provincia/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_provincia_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::showAction',));
                    }

                    // admin_provincia_edit
                    if (0 === strpos($pathinfo, '/admin/provincia/edit') && preg_match('#^/admin/provincia/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_provincia_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::editAction',));
                    }

                    // admin_provincia_new
                    if ($pathinfo === '/admin/provincia/new') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::newAction',  '_route' => 'admin_provincia_new',);
                    }

                    // admin_provincia_delete
                    if (0 === strpos($pathinfo, '/admin/provincia/delete') && preg_match('#^/admin/provincia/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_provincia_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ProvinciaController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/serveisconsumits')) {
                // admin_serveisconsumits
                if (rtrim($pathinfo, '/') === '/admin/serveisconsumits') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_serveisconsumits');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::indexAction',  '_route' => 'admin_serveisconsumits',);
                }

                // admin_serveisconsumits_create
                if ($pathinfo === '/admin/serveisconsumits/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::createAction',  '_route' => 'admin_serveisconsumits_create',);
                }

                // admin_serveisconsumits_update
                if (0 === strpos($pathinfo, '/admin/serveisconsumits/update') && preg_match('#^/admin/serveisconsumits/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveisconsumits_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::updateAction',));
                }

                // admin_serveisconsumits_show
                if (0 === strpos($pathinfo, '/admin/serveisconsumits/show') && preg_match('#^/admin/serveisconsumits/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveisconsumits_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::showAction',));
                }

                // admin_serveisconsumits_edit
                if (0 === strpos($pathinfo, '/admin/serveisconsumits/edit') && preg_match('#^/admin/serveisconsumits/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveisconsumits_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::editAction',));
                }

                // admin_serveisconsumits_new
                if ($pathinfo === '/admin/serveisconsumits/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::newAction',  '_route' => 'admin_serveisconsumits_new',);
                }

                // admin_serveisconsumits_delete
                if (0 === strpos($pathinfo, '/admin/serveisconsumits/delete') && preg_match('#^/admin/serveisconsumits/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_serveisconsumits_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ServeisconsumitsController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/valoracioservei')) {
                // admin_valoracioservei
                if (rtrim($pathinfo, '/') === '/admin/valoracioservei') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_valoracioservei');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::indexAction',  '_route' => 'admin_valoracioservei',);
                }

                // admin_valoracioservei_create
                if ($pathinfo === '/admin/valoracioservei/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::createAction',  '_route' => 'admin_valoracioservei_create',);
                }

                // admin_valoracioservei_update
                if (0 === strpos($pathinfo, '/admin/valoracioservei/update') && preg_match('#^/admin/valoracioservei/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_valoracioservei_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::updateAction',));
                }

                // admin_valoracioservei_show
                if (0 === strpos($pathinfo, '/admin/valoracioservei/show') && preg_match('#^/admin/valoracioservei/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_valoracioservei_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::showAction',));
                }

                // admin_valoracioservei_edit
                if (0 === strpos($pathinfo, '/admin/valoracioservei/edit') && preg_match('#^/admin/valoracioservei/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_valoracioservei_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::editAction',));
                }

                // admin_valoracioservei_new
                if ($pathinfo === '/admin/valoracioservei/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::newAction',  '_route' => 'admin_valoracioservei_new',);
                }

                // admin_valoracioservei_delete
                if (0 === strpos($pathinfo, '/admin/valoracioservei/delete') && preg_match('#^/admin/valoracioservei/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_valoracioservei_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\ValoracioServeiController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/evaluacioservei')) {
                // admin_evaluacioservei
                if (rtrim($pathinfo, '/') === '/admin/evaluacioservei') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_evaluacioservei');
                    }

                    return array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:index',  '_route' => 'admin_evaluacioservei',);
                }

                // admin_evaluacioservei_create
                if ($pathinfo === '/admin/evaluacioservei/create') {
                    return array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:create',  '_route' => 'admin_evaluacioservei_create',);
                }

                // admin_evaluacioservei_update
                if (0 === strpos($pathinfo, '/admin/evaluacioservei/update') && preg_match('#^/admin/evaluacioservei/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_evaluacioservei_update')), array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:update',));
                }

                // admin_evaluacioservei_show
                if (0 === strpos($pathinfo, '/admin/evaluacioservei/show') && preg_match('#^/admin/evaluacioservei/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_evaluacioservei_show')), array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:show',));
                }

                // admin_evaluacioservei_edit
                if (0 === strpos($pathinfo, '/admin/evaluacioservei/edit') && preg_match('#^/admin/evaluacioservei/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_evaluacioservei_edit')), array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:edit',));
                }

                // admin_evaluacioservei_new
                if ($pathinfo === '/admin/evaluacioservei/new') {
                    return array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:new',  '_route' => 'admin_evaluacioservei_new',);
                }

                // admin_evaluacioservei_delete
                if (0 === strpos($pathinfo, '/admin/evaluacioservei/delete') && preg_match('#^/admin/evaluacioservei/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_evaluacioservei_delete')), array (  '_controller' => 'bonavallBancdeltempsBundle:Evaluacioservei:delete',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/solicituts')) {
                // admin_solicituts
                if (rtrim($pathinfo, '/') === '/admin/solicituts') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_solicituts');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::indexAction',  '_route' => 'admin_solicituts',);
                }

                // admin_solicituts_create
                if ($pathinfo === '/admin/solicituts/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::createAction',  '_route' => 'admin_solicituts_create',);
                }

                // admin_solicituts_update
                if (0 === strpos($pathinfo, '/admin/solicituts/update') && preg_match('#^/admin/solicituts/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_solicituts_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::updateAction',));
                }

                // admin_solicituts_show
                if (0 === strpos($pathinfo, '/admin/solicituts/show') && preg_match('#^/admin/solicituts/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_solicituts_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::showAction',));
                }

                // admin_solicituts_edit
                if (0 === strpos($pathinfo, '/admin/solicituts/edit') && preg_match('#^/admin/solicituts/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_solicituts_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::editAction',));
                }

                // admin_solicituts_new
                if ($pathinfo === '/admin/solicituts/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::newAction',  '_route' => 'admin_solicituts_new',);
                }

                // admin_solicituts_delete
                if (0 === strpos($pathinfo, '/admin/solicituts/delete') && preg_match('#^/admin/solicituts/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_solicituts_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\SolicitutsController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/missatges')) {
                // admin_missatges
                if (rtrim($pathinfo, '/') === '/admin/missatges') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_missatges');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::indexAction',  '_route' => 'admin_missatges',);
                }

                // admin_missatges_create
                if ($pathinfo === '/admin/missatges/create') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::createAction',  '_route' => 'admin_missatges_create',);
                }

                // admin_missatges_update
                if (0 === strpos($pathinfo, '/admin/missatges/update') && preg_match('#^/admin/missatges/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_missatges_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::updateAction',));
                }

                // admin_missatges_show
                if (0 === strpos($pathinfo, '/admin/missatges/show') && preg_match('#^/admin/missatges/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_missatges_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::showAction',));
                }

                // admin_missatges_edit
                if (0 === strpos($pathinfo, '/admin/missatges/edit') && preg_match('#^/admin/missatges/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_missatges_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::editAction',));
                }

                // admin_missatges_new
                if ($pathinfo === '/admin/missatges/new') {
                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::newAction',  '_route' => 'admin_missatges_new',);
                }

                // admin_missatges_delete
                if (0 === strpos($pathinfo, '/admin/missatges/delete') && preg_match('#^/admin/missatges/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_missatges_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\MissatgesController::deleteAction',));
                }

            }

        }

        // user_miss
        if (rtrim($pathinfo, '/') === '/missatges') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'user_miss');
            }

            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissController::indexAction',  '_route' => 'user_miss',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            if (0 === strpos($pathinfo, '/user/s')) {
                // missatges_ajax
                if ($pathinfo === '/user/solicituts/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_missatges_ajax;
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissController::greetingAction',  '_route' => 'missatges_ajax',);
                }
                not_missatges_ajax:

                if (0 === strpos($pathinfo, '/user/serveis')) {
                    // triacp_ajax
                    if ($pathinfo === '/user/serveiscp/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_triacp_ajax;
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::indexcpAction',  '_route' => 'triacp_ajax',);
                    }
                    not_triacp_ajax:

                    if (0 === strpos($pathinfo, '/user/serveisp')) {
                        // triapob_ajax
                        if ($pathinfo === '/user/serveispo/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_triapob_ajax;
                            }

                            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::indexpobAction',  '_route' => 'triapob_ajax',);
                        }
                        not_triapob_ajax:

                        // triaprov_ajax
                        if ($pathinfo === '/user/serveispr/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_triaprov_ajax;
                            }

                            return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::indexprovAction',  '_route' => 'triaprov_ajax',);
                        }
                        not_triaprov_ajax:

                    }

                }

            }

            // perfil_user
            if (rtrim($pathinfo, '/') === '/user/perfil') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'perfil_user');
                }

                return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UsuariController::perfilAction',  '_route' => 'perfil_user',);
            }

            if (0 === strpos($pathinfo, '/user/s')) {
                if (0 === strpos($pathinfo, '/user/solicituts')) {
                    // gestio_solicituds_enviades
                    if (rtrim($pathinfo, '/') === '/user/solicituts/enviades') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gestio_solicituds_enviades');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserSolicitutsController::enviadesAction',  '_route' => 'gestio_solicituds_enviades',);
                    }

                    // gestio_solicituds_rebudes
                    if (rtrim($pathinfo, '/') === '/user/solicituts/rebudes') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gestio_solicituds_rebudes');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserSolicitutsController::rebudesAction',  '_route' => 'gestio_solicituds_rebudes',);
                    }

                }

                if (0 === strpos($pathinfo, '/user/serveis')) {
                    // gestio_serveis
                    if (rtrim($pathinfo, '/') === '/user/serveis') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'gestio_serveis');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::indexAction',  '_route' => 'gestio_serveis',);
                    }

                    // user_serveis
                    if (rtrim($pathinfo, '/') === '/user/serveis') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'user_serveis');
                        }

                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::indexAction',  '_route' => 'user_serveis',);
                    }

                    // user_serveis_create
                    if ($pathinfo === '/user/serveis/create') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::createAction',  '_route' => 'user_serveis_create',);
                    }

                    // user_serveis_update
                    if (0 === strpos($pathinfo, '/user/serveis/update') && preg_match('#^/user/serveis/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_serveis_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::updateAction',));
                    }

                    // user_serveis_show
                    if (0 === strpos($pathinfo, '/user/serveis/show') && preg_match('#^/user/serveis/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_serveis_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::showAction',));
                    }

                    // user_serveis_edit
                    if (0 === strpos($pathinfo, '/user/serveis/edit') && preg_match('#^/user/serveis/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_serveis_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::editAction',));
                    }

                    // user_serveis_new
                    if ($pathinfo === '/user/serveis/new') {
                        return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::newAction',  '_route' => 'user_serveis_new',);
                    }

                    // user_serveis_delete
                    if (0 === strpos($pathinfo, '/user/serveis/delete') && preg_match('#^/user/serveis/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_serveis_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserServeisController::deleteAction',));
                    }

                    // user_serveis_solicita
                    if (0 === strpos($pathinfo, '/user/serveis/solicita') && preg_match('#^/user/serveis/solicita(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_serveis_solicita')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserSolicitutsController::newAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/user/missatges')) {
                // user_missatges
                if (rtrim($pathinfo, '/') === '/user/missatges') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'user_missatges');
                    }

                    return array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::indexAction',  '_route' => 'user_missatges',);
                }

                // user_missatges_create
                if (0 === strpos($pathinfo, '/user/missatges/create') && preg_match('#^/user/missatges/create(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_create')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::createAction',));
                }

                // user_missatges_update
                if (0 === strpos($pathinfo, '/user/missatges/update') && preg_match('#^/user/missatges/update(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_update')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::updateAction',));
                }

                // user_missatges_show
                if (0 === strpos($pathinfo, '/user/missatges/show') && preg_match('#^/user/missatges/show(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_show')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::showAction',));
                }

                // user_missatges_edit
                if (0 === strpos($pathinfo, '/user/missatges/edit') && preg_match('#^/user/missatges/edit(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_edit')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::editAction',));
                }

                // user_missatges_new
                if (0 === strpos($pathinfo, '/user/missatges/new') && preg_match('#^/user/missatges/new(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_new')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::newAction',));
                }

                // user_missatges_delete
                if (0 === strpos($pathinfo, '/user/missatges/delete') && preg_match('#^/user/missatges/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_delete')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::deleteAction',));
                }

                // user_missatges_solicita
                if (0 === strpos($pathinfo, '/user/missatges/solicita') && preg_match('#^/user/missatges/solicita(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_missatges_solicita')), array (  '_controller' => 'bonavall\\BancdeltempsBundle\\Controller\\UserMissatgesController::newAction',));
                }

            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
