import React, { useState } from 'react';

export const Form = () => {
    const [formData, setFormData] = useState({ cardName: '' });

    const getCsrfToken = async () => {
        const response = await fetch('http://127.0.0.1:8000/csrf-cookie');
        if (response.ok) {
            const csrfToken = response.headers.get('X-CSRF-TOKEN');
            return csrfToken;
        } else {
            throw new Error('Failed to get CSRF token');
        }
    };
    
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const csrfToken = await getCsrfToken();
            const response = await fetch('http://127.0.0.1:8000/api/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(formData),
            });


            if (response.ok) {
                console.log('Data sent successfully!');
            } else {
                throw new Error(`Failed to send data. Status: ${response.status}`);
            }
        } catch (error) {
            console.error('Error sending data:', error);
        }
    };
  
    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };
  
    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                name="cardName"
                value={formData.cardName}
                onChange={handleChange}
                placeholder="Enter Card Name"
            />
            <button type="submit">Submit</button>
        </form>
    );
};