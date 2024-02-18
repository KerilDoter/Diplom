import React, { useState } from 'react';
import axios from 'axios';

export const Form = () => {
    const [formData, setFormData] = useState({ cardName: '' });

    const handleSubmit = async (e) => {
      e.preventDefault();
      
      try {
        const response = await fetch('http://api.example.com/data', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
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

