<?php

require_once 'CRM/Contribute/Form.php';

class CRM_Contribute_Form_Refund extends CRM_Contribute_Form
{
    public function preProcess() 
    {
        parent::preProcess();

        $this->_id = CRM_Utils_Request::retrieve( 'id', 'Positive', $this );

        //$session = CRM_Core_Session::singleton();
        //$this->_userContext = $session->readUserContext( );

        require_once 'CRM/Contribute/BAO/Contribution.php';
        $this->contribution = new CRM_Contribute_BAO_Contribution();
        $this->contribution->id = $this->_id;
        if ( !$this->contribution->find( true ) ) {
            CRM_Core_Error::fatal( ts("Contribution does not exist: %1", array( 1 => $this->_id ) ) );
        }

        require_once 'CRM/Contact/BAO/Contact.php';
        $this->contact = new CRM_Contact_BAO_Contact();
        $this->contact->id = $this->contribution->contact_id;
        $this->contact->find( true );
    }

    function setDefaultValues( ) {
        $defaults['type'] = "refund";

        return $defaults;
    }


    /**
     * Function to build the form
     *
     * @return None
     * @access public
     */
    public function buildQuickForm( ) 
    {
        $this->addButtons(array(
            array (
                'type'      => 'next',
                'name'      => ts('Confirm')
            ),
            array (
                'type'      => 'cancel',
                'name'      => ts('Cancel')
            ),
        ));

        $this->addElement( 'checkbox', 'completed', ts('Refund has been completed') );

        $this->add('select', 'type', ts('Refund type'),array(
            '' => '- select -',
            'refund' => 'Refund',
            'chargeback' => 'Chargeback',
        ));

        $this->add( 'hidden', 'id', $this->_id );
        $this->assign( "contribution_id", $this->_id );

        list( $original_currency, $original_amount ) = explode( " ", $this->contribution->source );
        $this->assign( "original_currency", $original_currency );
        $this->assign( "original_amount", $original_amount );
        $this->assign( "receive_date", $this->contribution->receive_date );

        $this->assign( "contact_name", $this->contact->display_name );
        $this->assign( "view_original_contribution", CRM_Utils_System::url( 'civicrm/contact/view/contribution', "reset=1&action=view&id={$this->_id}&cid={$this->contact->id}" ) );
    }

    public function postProcess() 
    {
        $submittedValues = $this->controller->exportValues( $this->_name );

        $this->type = CRM_Utils_Array::value( 'type', $submittedValues, 'refund' );
        $this->completed = CRM_Utils_Array::value( 'completed', $submittedValues, false );

        if ( CRM_Utils_Array::value( '_qf_Refund_next', $this->_submitValues ) ) {
            try {
                $this->refund_id = module_invoke( 'wmf_civicrm', 'mark_refund', $this->_id, $this->type, $this->completed );
            } catch (Exception $e) {
                CRM_Core_Error::fatal( ts("Failed to mark refund: %1", array( 1 => $e->getMessage() ) ) );
            }

            CRM_Core_Session::setStatus( ts("Your %1 has been recorded. <a href=\"%2\">Edit</a> the refund contribution.", array(
                    1 => $this->type,
                    2 => CRM_Utils_System::url( 'civicrm/contact/view/contribution', "reset=1&action=update&id={$this->refund_id}&cid={$this->contact->id}" ),
            )) );
        }

        $session = CRM_Core_Session::singleton();
        $session->replaceUserContext( CRM_Utils_System::url( 'civicrm/contact/view', "reset=1&cid={$this->contact->id}&selectedChild=contribute" ) );
    }
}
