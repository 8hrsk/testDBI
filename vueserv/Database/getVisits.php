<?php

class getVisits extends Database {

    /**
     * Gets all domains that have at least 1 visit in the past week
     * and were created in the past 30 days.
     *
     * @return array
     */

    public function getVisits() { //! finish later
        $this->connect();
        $result =$this->connection->query('
            SELECT
                d.id as domain_id,
                d.domain as domain,
            FROM
                domains d
                JOIN users u ON d.user_id = u.id
                JOIN visit v on v.domain_id = d.id
            WHERE
                d.created_at > NOW() - INTERVAL 1 WEEK
                AND u.created_at > NOW() - INTERVAL 30 DAY
            HAVING
                COUNT(v.id) > 0
        ');

        if ($result->num_rows > 0) {
            $result = $result->fetch_all(MYSQLI_ASSOC);
        }

        $this->close();

        return $result;
    }
}