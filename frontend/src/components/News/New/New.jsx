import styles from './New.module.css'
import {useEffect, useState} from "react";
import moment from 'moment';

export const New = () => {
    const [appState, setAppState] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setAppState(data);
                // console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);
    // const moderatedNews = appState?.filter(news => news.moderation === true);
    const listNews = appState?.map((news) => {
        return <div className={styles.table}>
            <p className={`${styles.text} ${styles.flex}`}>{news.user_id}
                {/*<img className={styles.avatar}*/}
                {/*     src={news.image}*/}
                {/*     alt="avatar"/>*/}
            </p>
            <p className={styles.text}>{moment(news.created_at).format('YYYY-MM-DD')}</p>
            <p className={styles.text}>{news.title}</p>
            <p className={`${styles.text} ${styles.flex}`}>{news.description}
                <svg className={styles.icon} width="14.000000" height="16.000000" viewBox="0 0 14 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path id="Icon"
                          d="M13.5 4.45C13.5 4.12 13.32 3.83 13.05 3.66L6.94 0.12C6.67 -0.05 6.32 -0.05 6.05 0.12L-0.06 3.66C-0.33 3.83 -0.5 4.12 -0.5 4.45L-0.5 11.54C-0.5 11.87 -0.33 12.16 -0.06 12.33L6.05 15.87C6.32 16.04 6.67 16.04 6.94 15.87L13.05 12.33C13.32 12.16 13.5 11.87 13.5 11.54L13.5 4.45ZM6.5 10.71C7.98 10.71 9.19 9.49 9.19 8C9.19 6.5 7.98 5.28 6.5 5.28C5.01 5.28 3.8 6.5 3.8 8C3.8 9.49 5.01 10.71 6.5 10.71Z"
                          fill="#4F4D55" fill-opacity="1.000000" fill-rule="evenodd"/>
                </svg>
            </p>
        </div>


    })
    return <>
        {listNews}
    </>
}