import styles from './Header.module.css'
import {SearchBar} from "./SearchBar/SearchBar";
import {CreateIdea} from "./CreateIdea/CreateIdea";
import {useState} from "react";
import {Link, NavLink} from "react-router-dom";

export const Header = () => {

    const token = localStorage.getItem('token');
    const [isLoggedIn, setIsLoggedIn] = useState(!!token);

    const handleLogout = () => {
        localStorage.removeItem('token');
        setIsLoggedIn(false);
    };
    return <div className={styles.header}>
        <SearchBar/>
        {token ? (
            <div className={styles.flex}>
                <CreateIdea />
                <a href="#">
                    <svg width="19.000000" height="18.000000" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector" d="M9.18 16.93L13.74 14.99C13.82 15.55 13.72 16.13 13.44 16.62C13.16 17.11 12.73 17.5 12.21 17.72C11.69 17.94 11.11 17.99 10.56 17.84C10.01 17.7 9.53 17.38 9.18 16.93ZM4.42 -0.23C6.18 -1.02 8.18 -1.09 9.99 -0.43C11.81 0.22 13.3 1.55 14.15 3.28L14.27 3.55L15.92 7.25L18.09 9.13C18.21 9.23 18.32 9.35 18.43 9.55L18.51 9.69C18.6 9.89 18.64 10.09 18.65 10.3C18.65 10.51 18.62 10.72 18.54 10.92C18.46 11.11 18.35 11.29 18.21 11.45C18.06 11.6 17.89 11.72 17.7 11.81L4.48 17.65C4.24 17.76 3.97 17.8 3.7 17.78C3.44 17.76 3.18 17.67 2.96 17.53C2.74 17.38 2.55 17.19 2.43 16.95C2.3 16.72 2.23 16.46 2.23 16.19L2.23 13.19L0.64 9.62C0.24 8.72 0.02 7.76 0 6.78C-0.03 5.8 0.14 4.83 0.49 3.91C0.84 3 1.37 2.16 2.04 1.45C2.72 0.74 3.53 0.17 4.42 -0.23ZM2.4 8.84L4.15 12.78L4.15 15.7L16.46 10.25L14.34 8.42L12.53 4.35L12.42 4.12C11.79 2.84 10.68 1.85 9.33 1.37C7.99 0.88 6.51 0.94 5.21 1.52C4.54 1.82 3.94 2.24 3.44 2.77C2.94 3.3 2.54 3.92 2.28 4.6C2.02 5.28 1.9 6 1.92 6.73C1.94 7.46 2.1 8.17 2.4 8.84Z" fill="#323232" fillOpacity="1.000000" fillRule="nonzero" />
                    </svg>
                </a>
               <Link to="profile">
                   <div className={styles.blockAvatar}>
                           <a href="" className={styles.avatar}>
                               <img src="https://99px.ru/sstorage/53/2023/10/tmb_353266_394823.jpg" alt="Avatar" />
                           </a>
                   </div> 
               </Link>
                <Link to="/home" className={styles.btn} onClick={handleLogout}>
                    <p className={styles.name}>
                        Выйти
                    </p>
                </Link>
            </div>
        ) : (
            <Link to="signup" className={styles.btn}>
                <p className={styles.name}>
                    Зарегестрироваться
                </p>
            </Link>
        )}
    </div>
};

