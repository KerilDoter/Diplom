import styles from "./Idea.module.css"
import {Link, useParams} from "react-router-dom";
import {useEffect, useState} from "react";
import moment from 'moment';

export const Idea = () => {
    const {id} = useParams();
    const [idea, setIdea] = useState(null);
    //const idea = ideas.find(idea => idea.id === Number(id));

    //const [ideasState, setIdeasState] = useState();
    useEffect(() => {
        fetch(`http://127.0.0.1:8000/api/post/${id}`)
            .then((response) => response.json())
            .then((data) => {
                setIdea(data);
                console.log(data);
            })
            .catch((error) => console.log(error));
    }, [id]);





    return (
        <div className={styles.content}>
            <div className={styles.header}>
                <div>
                    <Link to="/post">
                        <svg width="20.000000" height="20.000000" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <clipPath id="clip272_6462">
                                    <rect id="FlFilledArrowCurveDownLeft " width="20.000000" height="20.000000"
                                          transform="translate(20.000000 0.000000) rotate(90.000000)" fill="white"
                                          fill-opacity="0"/>
                                </clipPath>
                            </defs>
                            <rect id="FlFilledArrowCurveDownLeft " width="20.000000" height="20.000000"
                                  transform="translate(20.000000 0.000000) rotate(90.000000)" fill="#FFFFFF"
                                  fill-opacity="0"/>
                            <g clip-path="url(#clip272_6462)">
                                <path id="Vector"
                                      d="M17.28 14.05C17.09 14.16 16.86 14.19 16.65 14.13C16.44 14.07 16.26 13.93 16.15 13.74C15.25 12.18 14.18 11.48 13.07 11.15C11.99 10.82 10.86 10.83 9.68 10.83L9.37 10.83L5.13 10.83L7.88 13.57C7.96 13.65 8.02 13.74 8.06 13.84C8.11 13.94 8.13 14.05 8.13 14.16C8.13 14.28 8.11 14.39 8.07 14.49C8.03 14.59 7.96 14.68 7.89 14.76C7.81 14.84 7.71 14.9 7.61 14.94C7.51 14.99 7.4 15.01 7.29 15.01C7.18 15 7.07 14.98 6.97 14.94C6.87 14.89 6.77 14.83 6.7 14.75L2.53 10.58C2.37 10.43 2.29 10.22 2.29 10C2.29 9.77 2.37 9.56 2.53 9.41L6.7 5.24C6.77 5.16 6.87 5.1 6.97 5.05C7.07 5.01 7.18 4.99 7.29 4.98C7.4 4.98 7.51 5 7.61 5.05C7.71 5.09 7.81 5.15 7.89 5.23C7.96 5.31 8.03 5.4 8.07 5.5C8.11 5.6 8.13 5.71 8.13 5.83C8.13 5.94 8.11 6.05 8.06 6.15C8.02 6.25 7.96 6.34 7.88 6.42L5.13 9.16L9.37 9.16L9.7 9.16C10.85 9.16 12.22 9.15 13.55 9.55C15.06 10.01 16.49 10.98 17.59 12.92C17.7 13.11 17.73 13.33 17.67 13.55C17.62 13.76 17.48 13.94 17.28 14.05Z"
                                      fill="#000000" fill-opacity="1.000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </Link>
                </div>
                {idea && (<h2 className={styles.heading}>Идея № {idea.id}</h2>)}
            </div>
            <div>
                <div className={styles.card}>
                    <div className={styles.header}>
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
                        <p className={styles.subheading}>{}</p>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                        {idea && ( <p className={styles.headInfo}>Информация об авторе {idea.user_id}</p> )}
                            <div className={styles.footInfo}>
                                <img className={styles.image}
                                     src="https://otkrit-ka.ru/uploads/posts/2023-04/otkrit-ka.ru_foto-otkrytki-belki-na-avu-1.jpg"
                                     alt="avatar"/>
                                <div>
                                    <p className={styles.topText}>{}</p>
                                    <p className={styles.botText}>Студент</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                            <p className={styles.headInfo}>Информация о сооавторе</p>
                            <div className={styles.footInfo}>
                                <img className={styles.image}
                                     src="https://otkrit-ka.ru/uploads/posts/2023-04/otkrit-ka.ru_foto-otkrytki-belki-na-avu-1.jpg"
                                     alt="avatar"/>
                                <div>
                                    <p className={styles.topText}>{}</p>
                                    <p className={styles.botText}>Студент</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                            <p className={styles.headInfo}>Дата:</p>
                            {idea && (<p className={styles.topText}>{moment(idea.created_at).format('YYYY-MM-DD')}</p>)}
                        </div>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                            <p className={styles.headInfo}>Статус проект:</p>
                            {idea && (<p className={styles.topText}>{idea.status.title}</p>)}
                        </div>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                            <p className={styles.headInfo}>Теги:</p>
                            <div className={styles.tags}>
                                <p className={styles.tag}>Дизайн</p>
                                <p className={styles.tag}>Разработка</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div className={styles.card}>
                    <div className={styles.header}>
                        <p className={styles.subheading}>Дополнительная информация</p>
                    </div>
                    <div className={styles.info}>
                        <div className={styles.infoTop}>
                            <p className={styles.headInfo}>Описание проекта:</p>
                            {idea && (<p className={styles.topText}>{idea.description}</p>)}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}