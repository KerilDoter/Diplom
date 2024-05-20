import styles from './Ideas.module.css'
import {Tab, TabList, TabPanel, Tabs} from "react-tabs";
import {Link} from "react-router-dom";
import moment from 'moment';
import {useEffect, useState} from "react";

export const Ideas = () => {

    const [countState, setCountState] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/count", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setCountState(data);
                // console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);

    const [ideasState, setIdeasState] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setIdeasState(data);
                console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);

    return <div className={styles.content}>
        <h2>Идеи</h2>
        <Tabs>
            <TabList className={styles.tabslist}>
                <Tab className={styles.tab}>Все идеи</Tab>
                <Tab className={styles.tab}>Мои идеи</Tab>
                <Tab className={styles.tab}>Черновик</Tab>
            </TabList>
            <TabPanel>
                <div className={styles.subheader}>
                    <h2>Идеи</h2>
                    <p className={styles.idea}>{countState ? countState.posts : "Загрузка..."} идей</p>
                </div>
                <div className={styles.cards}>
                    {ideasState?.map((idea) => {
                        return <div className={styles.cardFlex}>
                           <Link to={`${idea.id}`} key={idea.id}>
                               <div>
                                   <div className={styles.card}>
                                       <div className={styles.cardTop}>
                                           <div>
                                               <svg width="24.000000" height="24.000000" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                   <defs>
                                                       <clipPath id="clip214_10797">
                                                           <rect id="dot" rx="-0.500000" width="23.000000"
                                                                 height="23.000000"
                                                                 transform="translate(0.500000 0.500000)" fill="white"
                                                                 fill-opacity="0"/>
                                                       </clipPath>
                                                   </defs>
                                                   <rect id="dot" rx="-0.500000" width="23.000000" height="23.000000"
                                                         transform="translate(0.500000 0.500000)" fill="#FFFFFF"
                                                         fill-opacity="0"/>
                                                   <g clip-path="url(#clip214_10797)">
                                                       <circle id="Ellipse 7" cx="12.000000" cy="12.000000" r="4.000000"
                                                               fill="#1751D0" fill-opacity="1.000000"/>
                                                   </g>
                                               </svg>
                                           </div>
                                           <h3>{idea.title}</h3>
                                           <div>
                                               <svg width="20.000000" height="20.000000" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                   <rect id="star-02" rx="-0.500000" width="19.000000" height="19.000000"
                                                         transform="translate(0.500000 0.500000)"
                                                         fill="#FFFFFF" fill-opacity="0"/>
                                                   <path id="Icon"
                                                         d="M12.64 6.77C12.71 6.91 12.84 7.01 13 7.03L17.98 7.75C18.37 7.81 18.52 8.28 18.24 8.55L14.63 12.07C14.52 12.18 14.47 12.33 14.5 12.48L15.35 17.45C15.42 17.83 15.01 18.12 14.67 17.94L10.21 15.6C10.08 15.53 9.91 15.53 9.78 15.6L5.32 17.94C4.98 18.12 4.57 17.83 4.64 17.45L5.49 12.48C5.52 12.33 5.47 12.18 5.36 12.07L1.75 8.55C1.47 8.28 1.63 7.81 2.01 7.75L6.99 7.03C7.15 7.01 7.28 6.91 7.35 6.77L9.57 2.26C9.75 1.91 10.24 1.91 10.42 2.26L12.64 6.77Z"
                                                         stroke="#F1BC00" stroke-opacity="1.000000" stroke-width="2.000000"
                                                         stroke-linejoin="round"/>
                                               </svg>
                                           </div>
                                       </div>
                                       <div className={styles.left}>Автор: <span
                                           className={styles.right}>{idea.user_id}</span></div>
                                       <div className={styles.left}>
                                           Дата создания:
                                           <span className={styles.right}>{moment(idea.created_at).format('YYYY-MM-DD')}
  </span></div>
                                       <div className={styles.left}>Статус: 
                                       {idea.status.title && (<span
                                         className={styles.right}>{idea.status.title}</span>)}
                                       </div>
                                   </div>
                               </div>
                           </Link>
                        </div>
                    })}
                </div>
            </TabPanel>
        </Tabs>
    </div>
}