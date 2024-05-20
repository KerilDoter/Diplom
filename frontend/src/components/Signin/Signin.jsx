import React, { useState } from 'react';
import styles from "./Signin.module.css"
import {Link} from "react-router-dom";
import {Tab, TabList, TabPanel, Tabs} from "react-tabs";

export const Signin = () => {
    /*
    const [formData, setFormData] = useState({ email: '' , password: ''});

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

            // Допустим, что в ответе с бэкенда возвращается информация о пользователе в виде userData
            const response = await fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${csrfToken}`,
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                const userData = await response.json();
                console.log('User data:', userData);

                // Сохраняем токен в localStorage
                localStorage.setItem('accessToken', csrfToken);

                // Далее вы можете использовать информацию о пользователе для дальнейшей обработки
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
    */
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');
  
    const handleSubmit = async (e) => {
        e.preventDefault();
      
        try {
          const response = await fetch('http://127.0.0.1:8000/api/login', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email, password }),
          });
      
          if (!response.ok) {
            throw new Error('Invalid credentials');
          }
      
          const data = await response.json();
          if (!data || !data.access_token) {
            throw new Error('Token not found in response');
          }
      
          localStorage.setItem('token', data.access_token); // Сохраняем токен в локальном хранилище
          window.location.href = '/profile'; // Редирект на личный кабинет
        } catch (error) {
          setError(error.message);
        }
      };
    return (
        <div className={styles.container}>
            <div className={styles.flex}>
                <div className={styles.background}>
                    <h2 className={styles.h}>Нет аккаунта?</h2>
                    <p className={styles.text}>Зарегестрироваться</p>
                    <Link to="/signup">
                        <a href="#" className={styles.btn2}>
                            <p className={styles.name2}>
                                Далее
                            </p>
                        </a>
                    </Link>
                </div>
                <div className={styles.form}>
                    <div className={styles.form}>
                        <svg width="60.000000" height="60.000000" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient x1="27.272747" y1="59.333630" x2="27.272747" y2="4.788162" id="paint_linear_127_40495_0" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#1751D0"/>
                                    <stop offset="1.000000" stop-color="#1751D0" stop-opacity="0.000000"/>
                                </linearGradient>
                            </defs>
                            <path id="Subtract" d="M30.7274 5.0049C30.2537 6.66925 30 8.42635 30 10.2427C30 20.7863 38.5472 29.3336 49.0909 29.3336C50.9072 29.3336 52.6644 29.0799 54.3287 28.6061C54.4718 29.7376 54.5455 30.8906 54.5455 32.0609C54.5455 47.1232 42.3351 59.3336 27.2727 59.3336L0 59.3336C0 59.3336 0 38.7792 0 32.0609C0 16.9986 12.2104 4.78816 27.2727 4.78816C28.443 4.78816 29.5961 4.86186 30.7274 5.0049Z" clip-rule="evenodd" fill="url(#paint_linear_127_40495_0)" fill-opacity="1.000000" fill-rule="evenodd"/>
                            <ellipse id="Ellipse 23" cx="49.090820" cy="10.242706" rx="10.909099" ry="10.909092" fill="#EFEFEF" fill-opacity="1.000000"/>
                        </svg>
                        <p className={styles.header}>Войти</p>

                    </div>
                    <div>
                    {error && <p>{error}</p>}
      <form onSubmit={handleSubmit} className={styles.form}>
        <input
          type="email"
          placeholder="Введите почту"
          className={styles.input}
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          required
          
        />
        <input
          type="password"
          placeholder="Введите пароль"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className={styles.input}
          required
        />
        <button type="submit" className={styles.btn}>Login</button>
      </form>

                    </div>
                </div>
            </div>
        </div>

    );
};
