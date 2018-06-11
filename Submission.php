<?php
/**
 * Date: 8/28/16
 * Time: 9:19 PM
 *
 * This class just provides the internal id of a Submission.
 * A submission is created through an external website that a customer has filled out and submitted.
 * Part of the submission details is where they bought the product and the company details that supplied that product.
 * Database details: A company database that includes company location details and two additional columns of an internal id and an id
 */

namespace GetCompanyDetails;

class Submission
{
    private $internalId;

    // Constructor that accepts a submission's internal id
    public function __construct($internalId)
    {
        $this->internalId = $internalId;
    }

    /**
     * This function cross references a submission's internal id to company's id from a database
     * The company id supplies the company detail information.
     * @return int
     */
    public function getClientId()
    {
        // The internal id and the return company id are hard coded
        if($this->internalId == 3) {
            return 348;
        }
    }
}
