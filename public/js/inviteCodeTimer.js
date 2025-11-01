        async function fetchInviteCode() {
            try {
                const response = await fetch('/api/household/invite-code', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('auth_token')}`,  // assuming token is saved in localStorage
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();
                if (response.ok) {
                    // Update the DOM or handle the new invite code
                    console.log('New Invite Code:', data.invite_code);
                    alert(data.message);  // Notify the user of the status
                } else {
                    console.error(data.message);  // Error, no household data found
                }
            } catch (error) {
                console.error('Error fetching invite code:', error);
            }
        }

        // Timer to check the invite code every 1 minute
        setInterval(fetchInviteCode, 60000);  // 60000 ms = 1 minute

        // Optional: you can call it immediately when the page loads to check the current status
        fetchInviteCode();