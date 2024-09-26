<?php

class Visit extends Database {

    public array $visit_data;

    public function __construct(array $visitData) {
        $this->visit_data = $visitData;
    }

    public function save() {
        $this->connect();
        $this->getDomainIdByName($this->visit_data["domain"]);
        $this->query();
        $this->close();
    }

    private function query() {
        $this->connection->query('
            INSERT INTO visits
            (page, domain_id, ip, user_agent, browser, device, platform)
            VALUES
            (
                "' . $this->visit_data["page"] . '",
                "' . $this->visit_data["domain_id"] . '",
                "' . $this->visit_data["ip"] . '",
                "' . $this->visit_data["user_agent"] . '",
                "' . $this->visit_data["browser"] . '",
                "' . $this->visit_data["device"] . '",
                "' . $this->visit_data["platform"] . '"
            )
        ');
    }

    private function getDomainIdByName($domainName) {
        $this->connect();
        $result = $this->connection->query('
            SELECT id
            FROM domains
            WHERE domain = "' . $domainName . '"
        ');

        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
        }

        $this->close();

        $this->visit_data["domain_id"] = $result["id"];
    }
}