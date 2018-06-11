<?php
/**
 * Date: 8/28/16
 * Time: 9:19 PM
 */

namespace GetCompanyDetails;

use \PDO;
use \PDOException;

require_once('Submission.php');

$getCompanyId = new Submission(3);
$companyid = $getCompanyId->getClientId();

// Connect to the database
try {
    $handler = new PDO('mysql:host=127.0.0.1;dbname=company', 'root', 'password');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $handler->prepare('SELECT internal_id, company_name, contact_name, address1, address2, city, state, zip, tax_id FROM company.client_details WHERE internal_id = :id');
    $stmt->execute(array(':id' => $companyid));

    $dbRow = $stmt->fetch(PDO::FETCH_OBJ);
    echo $dbRow->internal_id . '<br />';
    echo "Company Name: " . $dbRow->company_name . '<br />';
    echo "Contact Name; " . $dbRow->contact_name . '<br />';
    echo "Address: " . $dbRow->address1 . '<br />';
    echo "Address 2: " . $dbRow->address2 . '<br />';
    echo "City: " . $dbRow->city . '<br />';
    echo "State: " . $dbRow->state . '<br />';
    echo "Zip: " . $dbRow->zip. '<br />';
    echo "Tax ID: " . $dbRow->tax_id . '<br />';

} catch (PDOException $e) {
    echo $e->getMessage();
}











