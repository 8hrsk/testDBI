fetch('http://localhost:9095', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        url: window.location.href
    })
});

fetch('http://localhost:9095/text', {
    method: 'POST',
    headers: {
        'Content-Type': 'text/plain'
    },
    body: 'Hello from the other side'
});
