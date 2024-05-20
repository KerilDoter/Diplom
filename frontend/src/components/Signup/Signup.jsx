import styles from './Signup.module.css'
import {Tab, TabList, TabPanel, Tabs} from "react-tabs";
import {Link} from "react-router-dom";
import {useState} from "react";
import axios from "axios";

export const Signup = () => {

    const [formData, setFormData] = useState({ email: '' , password: '', surname: '', name: '', patronymic: '', group: ''});
    const [formData2, setFormData2] = useState({ email: '' , password: '', surname: '', name: '', patronymic: '', department: '', position: ''});

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
            const response = await fetch('http://127.0.0.1:8000/api/register/student', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + csrfToken,
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
    const handleChange2 = (e) => {
        setFormData2({ ...formData2, [e.target.name]: e.target.value });
    };

    const handleSubmit2 = async (e) => {
        e.preventDefault();
        try {
            const csrfToken = await getCsrfToken();

            // Допустим, что в ответе с бэкенда возвращается информация о пользователе в виде userData
            const response = await fetch('http://127.0.0.1:8000/api/register/teacher', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${csrfToken}`,
                },
                body: JSON.stringify(formData2),
            });

            if (response.ok) {
                const userData2= await response.json();
                console.log('User data:', userData2);

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
    return <div className={styles.container}>
        <div className={styles.flex}>
            <div className={styles.background}>
                <h2 className={styles.h}>Есть аккаунт?</h2>
                <p className={styles.text}>Войдите в систему</p>
                <Link to="/signin">
                    <a href="#" className={styles.btn2}>
                        <p className={styles.name2}>
                            Далее
                        </p>
                    </a>
                </Link>
            </div>
            <div className={styles.form}>
                <div className={styles.form}>
                    <svg width="60.000000" height="60.000000" viewBox="0 0 60 60" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="27.272747" y1="59.333630" x2="27.272747" y2="4.788162"
                                            id="paint_linear_127_40495_0" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1751D0"/>
                                <stop offset="1.000000" stop-color="#1751D0" stop-opacity="0.000000"/>
                            </linearGradient>
                        </defs>
                        <path id="Subtract"
                              d="M30.7274 5.0049C30.2537 6.66925 30 8.42635 30 10.2427C30 20.7863 38.5472 29.3336 49.0909 29.3336C50.9072 29.3336 52.6644 29.0799 54.3287 28.6061C54.4718 29.7376 54.5455 30.8906 54.5455 32.0609C54.5455 47.1232 42.3351 59.3336 27.2727 59.3336L0 59.3336C0 59.3336 0 38.7792 0 32.0609C0 16.9986 12.2104 4.78816 27.2727 4.78816C28.443 4.78816 29.5961 4.86186 30.7274 5.0049Z"
                              clip-rule="evenodd" fill="url(#paint_linear_127_40495_0)" fill-opacity="1.000000"
                              fill-rule="evenodd"/>
                        <ellipse id="Ellipse 23" cx="49.090820" cy="10.242706" rx="10.909099" ry="10.909092"
                                 fill="#EFEFEF" fill-opacity="1.000000"/>
                    </svg>
                    <p className={styles.header}>Зарегистрироваться</p>

                </div>
                <div>
                    <Tabs>
                        <TabList className={styles.tabs}>
                            <Tab className={styles.tab}>Студент</Tab>
                            <Tab className={styles.tab}>Преподаватель</Tab>
                        </TabList>
                        <TabPanel>
                            <form onSubmit={handleSubmit} className={styles.form}>
                                <div className={styles.pole}>
                                    <input
                                        className={styles.input}
                                        type="email"
                                        placeholder="Почта"
                                        name="email"
                                        value={formData.email}
                                        onChange={handleChange}
                                    />
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData.password}
                                        onChange={handleChange}
                                        className={styles.input} type="password" placeholder="Пароль" name="password"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData.surname}
                                        onChange={handleChange}
                                        className={styles.input} type="text" placeholder="Фамилия" name="surname"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData.name}
                                        onChange={handleChange}
                                        className={styles.input} type="text" placeholder="Имя" name="name"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData.patronymic}
                                        onChange={handleChange}
                                        className={styles.input} type="text" placeholder="Отчество" name="patronymic"/>
                                </div>
                                <div className={styles.pole}>

                                    <input
                                        value={formData.group}
                                        onChange={handleChange}
                                        className={styles.input} type="text" placeholder="Группа" name="group"/>
                                </div>
                                <button type="submit">Зарегестрироваться</button>
                            </form>
                        </TabPanel>
                        <TabPanel>
                            <form onSubmit={handleSubmit2} className={styles.form}>
                                <div className={styles.pole}>
                                    <input
                                        className={styles.input}
                                        type="email"
                                        placeholder="Почта"
                                        name="email"
                                        value={formData2.email}
                                        onChange={handleChange2}
                                    />
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.password}
                                        onChange={handleChange2}
                                        className={styles.input} type="password" placeholder="Пароль" name="password"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.surname}
                                        onChange={handleChange2}
                                        className={styles.input} type="text" placeholder="Фамилия" name="surname"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.name}
                                        onChange={handleChange2}
                                        className={styles.input} type="text" placeholder="Имя" name="name"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.patronymic}
                                        onChange={handleChange2}
                                        className={styles.input} type="text" placeholder="Отчество" name="patronymic"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.department}
                                        onChange={handleChange2}
                                        className={styles.input} type="text" placeholder="Кафедра" name="department"/>
                                </div>
                                <div className={styles.pole}>
                                    <input
                                        value={formData2.position}
                                        onChange={handleChange2}
                                        className={styles.input} type="text" placeholder="Должность" name="position"/>
                                </div>
                                <button type="submit">Зарегестрироваться</button>

                            </form>
                        </TabPanel>
                    </Tabs>
                </div>
            </div>
        </div>
    </div>
}