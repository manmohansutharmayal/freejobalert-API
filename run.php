<?php

// Include the library for web scraping (e.g., cURL)
function scrapeJobData() {
    // Target URL
    $url = "https://www.freejobalert.com/haryana-government-jobs/";

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL request
    $html = curl_exec($ch);
    if (curl_errno($ch)) {
        return ["error" => "Failed to fetch data: " . curl_error($ch)];
    }
    curl_close($ch);

    // Load HTML content into DOM
    $dom = new DOMDocument();
    @$dom->loadHTML($html); // Suppress warnings for malformed HTML
    $xpath = new DOMXPath($dom);

    // Find the table with the class 'lattbl'
    $table = $xpath->query("//table[contains(@class, 'lattbl')]");
    if ($table->length === 0) {
        return ["error" => "Table not found. Ensure the structure hasn't changed."];
    }

    $rows = $table->item(0)->getElementsByTagName('tr');
    $jobs = [];

    // Loop through rows and extract data
    foreach ($rows as $index => $row) {
        // Skip header row
        if ($index === 0) continue;

        $cols = $row->getElementsByTagName('td');
        if ($cols->length > 0) {
            $job = [
                "Post Date" => trim($cols->item(0)->textContent),
                "Recruitment Board" => trim($cols->item(1)->textContent),
                "Post Name" => trim($cols->item(2)->textContent),
                "Qualification" => trim($cols->item(3)->textContent),
                "Advt No" => trim($cols->item(4)->textContent),
                "Last Date" => trim($cols->item(5)->textContent),
                "More Information" => $cols->item(6)->getElementsByTagName('a')->length > 0
                    ? $cols->item(6)->getElementsByTagName('a')->item(0)->getAttribute('href')
                    : null
            ];
            $jobs[] = $job;
        }
    }

    return $jobs;
}

// Serve as API
header('Content-Type: application/json');
echo json_encode(scrapeJobData());

?>
