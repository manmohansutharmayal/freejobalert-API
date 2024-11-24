
# Freejobalert

A lightweight and efficient PHP-based API to scrape and deliver real-time job data from websites. This project is designed to extract job information, such as post dates, recruitment boards, qualifications, and links to detailed job descriptions, in a simple JSON format.




## Features

 - 🌐 Live Data: Scrapes real-time job data from the specified website.
 - ⚡ Lightweight API: Serves data directly without requiring a database.
 - 📄 Easy Integration: Returns clean JSON for seamless integration into web or mobile applications.
  - 🛠️ Customizable: Modify the scraping logic for other job portals or websites.



## Demo

Live API Endpoint:

- Coming Soon (Deploy to your live server to generate the link)

```bash
  [
    {
        "Post Date": "09/11/24",
        "Recruitment Board": "HPSC",
        "Post Name": "Reader – 14 Posts",
        "Qualification": "Degree (Ayurveda), PG",
        "Advt No": "71/2024",
        "Last Date": "28-11-2024",
        "More Information": "https://hpsc.gov.in/Portals/0/Advt_No_71_2024_Reader_in_various_subjects-06_11_2024.pdf"
    }
]

```


## How It Works

- Scrapes job data from a specified website using PHP and DOM parsing.
- Extracts key details such as post date, recruitment board, qualification, and more.
- Serves the data as JSON for easy consumption by other applications.
## Installation

- Clone the repository

```bash
 git clone https://github.com/manmohansutharmayal/freejobalert-API
```
- Upload the project to your PHP server (e.g., XAMPP, WAMP, or a live web server).
- Access the script through your browser or API client

```bash
http://localhost/freejobalert-API/run.php
```
## Usage

- Fetch All Jobs: Send a GET request to the API endpoint. Example:

```bash
GET http://localhost/freejobalert-API/run.php
```

- Integrate in Your App:


--------> Use fetch in JavaScript

```bash
fetch('http://localhost/freejobalert-API/run.php')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
```

--------> Or use Python’s requests library
```bash
import requests
response = requests.get('http://localhost/freejobalert-API/run.php')
print(response.json())
```


## Customization

- Update the target website URL in the script

```bash
$url = "https://www.freejobalert.com/haryana-government-jobs/";
```
- Modify the scraping logic in scrapeJobData()to match the structure of your target website.
## Contributing
Contributions are welcome! If you find a bug or want to add a feature:
- Fork the repository.
- Create a new branch (feature/new-feature).
- Commit your changes.
- Submit a pull request.
## License

This project is licensed under the MIT License. See the LICENSE file for details.
## Acknowledgements
- FreeJobAlert for providing job data.
- PHP and DOMDocument for parsing HTML content.
## Contact
For any issues or feature requests, please open an issue or email me at manmohansutharmayal@gmail.com


## Why Use JobScraperAPI?
- 🚀 Fast and Efficient: Directly serves live job data.
- 🔧 Customizable: Easy to adapt for other job portals.
- 💻 Open Source: Free to use and contribute!
