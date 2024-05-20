import styles from './CreateIdea.module.css'
import {Form} from "./Form/Form";
import {useState} from "react";
/*
token
title
description
content
category_id (подставляется апишка из категорий)
attachment_id (это файлы)

*/
export const CreateIdea = () => {
    const [isVisible, setIsVisible] = useState(false)
    const toggleVisible = () => {
        setIsVisible((prevVisible) => !prevVisible)
    }
    return <div>
        <a href="#" className={styles.btn} onClick={toggleVisible}>
            <p>
                <svg width="14.000000" height="16.000000" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Icon" d="M14 4.45C14 4.12 13.82 3.83 13.55 3.66L7.44 0.12C7.17 -0.05 6.82 -0.05 6.55 0.12L0.44 3.66C0.17 3.83 0 4.12 0 4.45L0 11.54C0 11.87 0.17 12.16 0.44 12.33L6.55 15.87C6.82 16.04 7.17 16.04 7.44 15.87L13.55 12.33C13.82 12.16 14 11.87 14 11.54L14 4.45ZM7 10.71C8.48 10.71 9.69 9.49 9.69 8C9.69 6.5 8.48 5.28 7 5.28C5.51 5.28 4.3 6.5 4.3 8C4.3 9.49 5.51 10.71 7 10.71Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="evenodd"/>
                </svg>
            </p>
            <p className={styles.name}>
                Создать идею
            </p>
        </a>
        {isVisible && <Form toggleVisible={toggleVisible} setIsVisible={setIsVisible}/>}
    </div>
}