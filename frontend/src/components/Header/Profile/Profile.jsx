import styles from './Profile.module.css'
import {useState} from "react";
import arrowDown from './../../../images/arrowDown.png'
import ava from './../../../images/ava.jpg'

export const Profile = () => {
    const [isVisible, setVisible] = useState(false)
    const toggleVisibility = () => {
        setVisible((prevVisible) => !prevVisible);
    };

    return <div>
        <div className={styles.profile}>
            <a href="#">
                <div className={styles.profileIcon} onClick={toggleVisibility}>
                    <img className={styles.ava} src={ava} alt="Avatar"/>
                </div>
            </a>
            {/*<div>*/}
            {/*    <a onClick={toggleVisibility} className={styles.btn}>*/}
            {/*        <img className={styles.arrow} src={arrowDown} alt="arrowDown"/>*/}
            {/*    </a>*/}
            {/*</div>*/}
            {isVisible && <ul className={styles.list}>
                <li className={styles.item}>item 1</li>
                <li className={styles.item}>item 2</li>
                <li className={styles.item}>item 3</li>
            </ul>}
        </div>

    </div>
}