
fetch('index.php')
    .then(response => {
        if (!response.ok) {
        throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        document.body.innerHTML = data;
    })
    .catch(error => {
        console.error('Error fetching PHP file:', error);
    })