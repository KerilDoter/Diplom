import styles from './News.module.css'
import {New} from "./New/New";
import {useEffect, useState} from "react";
import axios from "axios";
export const News = () => {

    return <div className={styles.news}>

        <div className={styles.heading}>
            <h1 className={styles.h1}>Новости</h1>

        </div>
        <div className={styles.table}>
            <p className={styles.text}>Автор</p>
            <p className={styles.text}>Дата</p>
            <p className={styles.text}>Название статьи</p>
            <p className={styles.text}>Дополнительная информация</p>
        </div>
        <div className={styles.border}></div>
        <div>
            <New />
        </div>
    </div>
}