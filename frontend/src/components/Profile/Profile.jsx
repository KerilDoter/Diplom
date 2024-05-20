/*global jwt_decode*/
import styles from './Profile.module.css'
import {useState, useEffect} from "react";
//import jwtDecode from "jwt-decode";
import { jwtDecode } from "jwt-decode";
export const Profile = () => {




    const [user, setUser] = useState(null);
  
    useEffect(() => {
        // Получение токена из локального хранилища
        const token = localStorage.getItem('token');
      
        // Декодирование токена и извлечение информации о пользователе
        if (token) {
            const decodedToken = jwtDecode(token);
            console.log("Decoded Token:", decodedToken); // Вывод в консоль для отладки
            setUser(decodedToken.user);
        }
    }, []);
    
    console.log("User:", user); // Вывод в консоль для отладки

    let role

    if(user?.rule_id === 2) {
        console.log(role)
        role = 'Студент';
    } else if (user?.rule_id === 1) {
        console.log(role)
        role = 'Преподаватель';
    } else if (user?.rule_id === 3){
        console.log(role)
        role = 'Администратор';
    }


    return <div className={styles.content}>
        <h2>Личный кабинет</h2>
        <div className={styles.infoTop}>
            <div>
                <img className={styles.avatar}
                     src="https://99px.ru/sstorage/53/2023/10/tmb_353266_394823.jpg"
                     alt="avatar"/>
                <span className={styles.avatarEdit}>
                    <svg width="28.000000" height="28.000000" viewBox="0 0 28 28" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <defs/>
                        <rect id="Frame 2043682570" rx="13.500000" width="27.000000" height="27.000000"
                              transform="translate(0.500000 0.500000)" fill="#1751D0" fill-opacity="1.000000"/>
                        <rect id="edit-04" width="16.000000" height="16.000000" transform="translate(6.000000 6.000000)"
                              fill="#FFFFFF" fill-opacity="0"/>
                        <path id="Icon"
                              d="M18.49 10.6C18.88 10.99 18.88 11.62 18.49 12.01L12.16 18.35C12.02 18.49 11.84 18.58 11.65 18.62L8.8 19.2L9.37 16.35C9.41 16.15 9.5 15.98 9.64 15.84L15.98 9.5C16.37 9.11 17 9.11 17.39 9.5L18.49 10.6Z"
                              stroke="#FFFFFF" stroke-opacity="1.000000" stroke-width="2.000000"
                              stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            <div className={styles.nameRole}>

                {user && (<p> {user.surname} {user.name} {user.patronymic}</p>)}
                <p className={styles.role}>
                   {user && role}
                </p>
            </div>
        </div>
        <div className={styles.info}>
            <div>
                <div>
                    <p className={styles.header}>О вас</p>
                    <div className={styles.block}>
                        <div className={styles.subInput}>Фамилия</div>
                        {user && (
                        <input className={styles.input} type="text" value={user.surname}/>)}
                    </div>
                    <div className={styles.block}>

                        <p className={styles.subInput}>Имя</p>
                        {user && (
                        <input className={styles.input} type="text" value={user.name}/>)}
                    </div>
                    <div className={styles.block}>
                        <p className={styles.subInput}>Отчество</p>
                         {user && (
                        <input className={styles.input} type="text" value={user.patronymic}/>)}
                    </div>
                    {user?.rule_id === 1 && (
                        <>
                            <div className={styles.block}>
                            <p className={styles.subInput}>Кафедра</p>
                            {user && (
                            <input className={styles.input} type="text" value={user.department}/>)}
                        </div>
                        <div className={styles.block}>
                            <p className={styles.subInput}>Должность</p>
                            {user && (
                            <input className={styles.input} type="text" value={user.position}/>)}
                        </div>
                        </>
                    )}
                    {user?.rule_id === 2 && (
                        <>
                            <div className={styles.block}>
                            <p className={styles.subInput}>Группа</p>
                            {user && (
                            <input className={styles.input} type="text" value={user.group}/>)}
                        </div>
                        </>
                    )}
                    {user?.rule_id === 3 && (
                        <>
                        
                        </>
                    )}
                    
                </div>
                <div>
                    <p className={styles.header}>Дополнительная информация</p>
                    <div className={styles.block}>
                        <input className={styles.input} type="text" placeholder="О себе"/>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <p className={styles.header}>Контакты</p>
                    <div className={styles.flex}>
                        <div className={styles.block}>
                            {user && (
                            <input className={styles.input2} type="text" placeholder="Номер телефона" value={user.phone}/>)}
                        </div>
                        <div>
                            {user && (
                            <input className={styles.input2} type="text" placeholder="Рабочий номер телефона" value={user.work_phone}/>)}
                        </div>
                    </div>
                    <div className={styles.block}>
                    {user && (
                <div>
                    <p>Email пользователя: {user.email}</p>
                </div>
            )}
                        {user && <input className={styles.input} type="text" value={user.email}/>}
                    </div>
                    <div className={styles.flex}>
                        <div className={styles.block}>
                            {user && (
                            <input className={styles.input2} type="text" placeholder={user.telegram}/>)}
                        </div>
                        <div>
                            {user && (
                            <input className={styles.input2} type="text" placeholder={user.vk}/>)}
                        </div>
                    </div>
                </div>
                <div>
                    <p className={styles.header}>Логин и пароль</p>
                    <div className={styles.flex}>
                        <div className={styles.block}>
                            <p className={styles.subInput}>Логин</p>
                            {user && <input className={styles.input2} type="text" value={user.email}/>}
                        </div>
                        <div className={styles.block}>
                            <p className={styles.subInput}>Пароль</p>
                            {user && <input className={styles.input2} type="password" value={user.password}/>}
                        </div>
                    </div>
                </div>
                <div>
                    <a href="" className={styles.password}>
                        <p className={styles.icon}>
                            <svg width="18.000000" height="18.000000" viewBox="0 0 18 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <defs/>
                                <rect id="gear" width="18.000000" height="18.000000" fill="#FFFFFF" fill-opacity="0"/>
                                <path id="Icon"
                                      d="M16.01 4.95L16.01 13.05L8.99 17.1L1.98 13.05L1.98 4.95L8.99 0.9L16.01 4.95ZM8.99 11.7C7.5 11.7 6.29 10.49 6.29 9C6.29 7.5 7.5 6.3 8.99 6.3C10.49 6.3 11.7 7.5 11.7 9C11.7 10.49 10.49 11.7 8.99 11.7Z"
                                      stroke="#000000" stroke-opacity="1.000000" stroke-width="1.500000"
                                      stroke-linejoin="round"/>
                            </svg>
                        </p>
                        <p>Сменить пароль</p></a>
                </div>
                <div className={styles.buttons}>
                    <a href="#" className={styles.btn2}>
                        <p className={styles.name2}>
                            Отмена
                        </p>
                    </a>
                    <a href="#" className={styles.btn1}>
                        <p className={styles.name1}>
                            Сохранить
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
}