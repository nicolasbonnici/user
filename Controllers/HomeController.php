<?php
namespace bundles\user\Controllers;

use bundles\auth\Models\Auth;
/**
 * User HomeController
 *
 * @author Nicolas Bonnici
 *
 */
class HomeController extends \Library\Core\Auth
{

    public function __preDispatch()
    {}

    public function __postDispatch()
    {}

    public function indexAction()
    {}

    /**
     * Show current logged user profile
     */
    public function profileAction()
    {
        // Update account password
        if (isset($this->aParams['password'], $this->aParams['passwordNew1'], $this->aParams['passwordNew2']) && ! empty($this->aParams['password']) && ! empty($this->aParams['passwordNew1']) && ! empty($this->aParams['passwordNew2']) && $this->aParams['passwordNew1'] === $this->aParams['passwordNew2']) {
            $oUser = new \app\Entities\User();
            try {
                $oAuthModel = Auth();
                $oUser->loadByParameters(array(
                    'iduser' => $this->_session['iduser'],
                    'mail' => $this->_session['mail'],
                    'pass' => $oAuthModel->formatPassword($this->aParams['password']),
                    'created' => $this->_session['created']
                ));
            } catch (CoreAuthControllerException $oException) {}
            if ($oUser->isLoaded()) {

                $oUser->pass = $this->formatPassword($this->aParams['passwordNew1']);
                $this->aView['passwordUpdate'] = $oUser->update();
            } else {
                $this->aView['passwordUpdate'] = false;
            }
        }

        $this->oView->render($this->aView, 'user/profile.tpl');
    }

}
