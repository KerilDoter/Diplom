import styles from './Card.module.css'
import {useEffect, useState} from "react";

export const Card = () => {
    const [appState, setAppState] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/count", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setAppState(data);
                // console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);

    const [appState2, setAppState2] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/post_moderation", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setAppState2(data);
                // console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);

    const [appState3, setAppState3] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/post_get_ready", {
            method: "GET",
        })
            .then((response) => response.json())
            .then((data) => {
                setAppState3(data);
                // console.log(data);
            })
            .catch((error) => console.log(error));
    }, []);
    return <>
             <div className={styles.card}>
                <div className={styles.top}>
                    <p className={styles.heading}>Всего идей</p>
                    <p><svg width="32.000000" height="32.000000" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip127_32486">
                            <rect id="Frame" rx="-0.500000" width="19.000000" height="19.000000"
                                  transform="translate(6.500000 6.500000)" fill="white" fill-opacity="0"/>
                        </clipPath>
                        <rect id="Frame 149286306" rx="4.500000" width="31.000000" height="31.000000"
                              transform="translate(0.500000 0.500000)" fill="#EFEFEF" fill-opacity="1.000000"/>
                        <rect id="Frame" rx="-0.500000" width="19.000000" height="19.000000"
                              transform="translate(6.500000 6.500000)" fill="#FFFFFF" fill-opacity="0"/>
                        <g clip-path="url(#clip127_32486)">
                            <g opacity="0.500000">
                                <path id="Vector"
                                      d="M21.98 6.36C22.22 6.13 22.54 6 22.87 6C23.2 6 23.52 6.13 23.75 6.36L25.63 8.24C25.86 8.47 25.99 8.79 25.99 9.12C25.99 9.45 25.86 9.77 25.63 10.01L23.75 11.89C23.52 12.12 23.2 12.25 22.87 12.25C22.54 12.25 22.22 12.12 21.98 11.89L20.1 10.01C19.87 9.77 19.74 9.45 19.74 9.12C19.74 8.79 19.87 8.47 20.1 8.24L21.98 6.36Z"
                                      fill="#323232" fill-opacity="1.000000" fill-rule="nonzero"/>
                            </g>
                            <path id="Vector"
                                  d="M9.12 26L10.99 26L10.99 21L6 21L6 22.87C6 23.7 6.32 24.49 6.91 25.08C7.5 25.67 8.29 26 9.12 26ZM10.99 14.75L10.99 19.75L6 19.75L6 14.75L10.99 14.75ZM17.24 19.75L12.24 19.75L12.24 14.75L17.24 14.75L17.24 19.75ZM12.24 21L17.24 21L17.24 26L12.24 26L12.24 21ZM18.49 14.75L18.49 19.75L23.49 19.75L23.49 14.75L18.49 14.75ZM18.49 21L23.49 21L23.49 22.87C23.49 23.7 23.16 24.49 22.58 25.08C21.99 25.67 21.2 26 20.37 26L18.49 26L18.49 21ZM6 13.5L10.99 13.5L10.99 8.5L9.12 8.5C8.29 8.5 7.5 8.83 6.91 9.41C6.32 10 6 10.79 6 11.62L6 13.5ZM12.24 13.5L12.24 8.5L17.24 8.5L17.24 13.5L12.24 13.5Z"
                                  fill="#323232" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </g>
                    </svg>
                    </p>
                </div>
                <p className={styles.count}>{appState ? appState.posts : "Загрузка..."}</p>
                <div className={styles.bot}>
                    <p className={styles.lastMouth}>за последний месяц</p>
                    <div className={styles.botText}>
                        <svg width="16.000000" height="16.000000" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <clipPath id="clip127_32495">
                                <rect id="icon/up" width="16.000000" height="16.000000"
                                      transform="translate(0.000000 -0.500000)" fill="white" fill-opacity="0"/>
                            </clipPath>
                            <rect id="icon/up" width="16.000000" height="16.000000"
                                  transform="translate(0.000000 -0.500000)" fill="#FFFFFF" fill-opacity="0"/>
                            <g clip-path="url(#clip127_32495)">
                                <path id="Vector" d="M2 10.83L6 6.83L8.66 9.5L14 4.16" stroke="#016626"
                                      stroke-opacity="1.000000" stroke-width="1.500000" stroke-linejoin="round"
                                      stroke-linecap="round"/>
                                <path id="Vector" d="M9.33 4.16L14 4.16L14 8.83" stroke="#016626"
                                      stroke-opacity="1.000000"
                                      stroke-width="1.500000" stroke-linejoin="round" stroke-linecap="round"/>
                            </g>
                        </svg>
                        <p className={styles.countMouth}>+22</p>
                    </div>
                </div>
            </div>
        <div className={styles.card}>
            <div className={styles.top}>
                <p className={styles.heading}>На модерации</p>
                <p><svg width="32.000000" height="32.000000" viewBox="0 0 32 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                    <clipPath id="clip127_32502">
                        <rect id="Frame" rx="-0.500000" width="17.000000" height="17.000000"
                              transform="translate(7.500000 7.500000)" fill="white" fill-opacity="0"/>
                    </clipPath>
                    <rect id="Frame 149286306" rx="4.500000" width="31.000000" height="31.000000"
                          transform="translate(0.500000 0.500000)" fill="#EFEFEF" fill-opacity="1.000000"/>
                    <rect id="Frame" rx="-0.500000" width="17.000000" height="17.000000"
                          transform="translate(7.500000 7.500000)" fill="#FFFFFF" fill-opacity="0"/>
                    <g clip-path="url(#clip127_32502)">
                        <path id="Vector"
                              d="M7.69 7.69C7.25 8.14 7 8.74 7 9.37L7 15.37L15.37 15.37L15.37 7L9.37 7C8.74 7 8.14 7.25 7.69 7.69ZM7 22.62L7 16.62L14.66 16.62C14.55 16.93 14.5 17.27 14.5 17.62L14.5 22.87C14.49 23.66 14.79 24.42 15.33 25L9.37 25C8.74 25 8.14 24.74 7.69 24.3C7.25 23.85 7 23.25 7 22.62ZM25 15.33L25 9.37C25 8.74 24.74 8.14 24.3 7.69C23.85 7.25 23.25 7 22.62 7L16.62 7L16.62 14.66C16.93 14.55 17.27 14.5 17.62 14.5L22.87 14.5C23.66 14.49 24.42 14.79 25 15.33Z"
                              fill="#323232" fill-opacity="1.000000" fill-rule="evenodd"/>
                        <g opacity="0.500000">
                            <path id="Vector"
                                  d="M15.5 17.62C15.5 17.06 15.72 16.52 16.12 16.12C16.52 15.72 17.06 15.5 17.62 15.5L22.87 15.5C23.43 15.5 23.97 15.72 24.37 16.12C24.77 16.52 25 17.06 25 17.62L25 22.87C25 23.43 24.77 23.97 24.37 24.37C23.97 24.77 23.43 25 22.87 25L17.62 25C17.06 25 16.52 24.77 16.12 24.37C15.72 23.97 15.5 23.43 15.5 22.87L15.5 17.62Z"
                                  fill="#323232" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </g>
                    </g>
                </svg>
                </p>
            </div>
            <p className={styles.count}>{appState2 ? appState2.posts : "0"}</p>
            <div className={styles.bot}>
                <p className={styles.lastMouth}>за последний месяц</p>
                <div className={styles.botText}>
                    <svg width="16.000000" height="16.000000" viewBox="0 0 16 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip127_32495">
                            <rect id="icon/up" width="16.000000" height="16.000000"
                                  transform="translate(0.000000 -0.500000)" fill="white" fill-opacity="0"/>
                        </clipPath>
                        <rect id="icon/up" width="16.000000" height="16.000000"
                              transform="translate(0.000000 -0.500000)" fill="#FFFFFF" fill-opacity="0"/>
                        <g clip-path="url(#clip127_32495)">
                            <path id="Vector" d="M2 10.83L6 6.83L8.66 9.5L14 4.16" stroke="#016626"
                                  stroke-opacity="1.000000" stroke-width="1.500000" stroke-linejoin="round"
                                  stroke-linecap="round"/>
                            <path id="Vector" d="M9.33 4.16L14 4.16L14 8.83" stroke="#016626"
                                  stroke-opacity="1.000000"
                                  stroke-width="1.500000" stroke-linejoin="round" stroke-linecap="round"/>
                        </g>
                    </svg>
                    <p className={styles.countMouth}>+32</p>
                </div>
            </div>
        </div>
        <div className={styles.card}>
            <div className={styles.top}>
                <p className={styles.heading}>В разработке</p>
                <p>
                    <svg width="32.000000" height="32.000000" viewBox="0 0 32 32" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip127_32518">
                            <rect id="Frame" rx="-0.500000" width="17.000000" height="17.000000"
                                  transform="translate(7.500000 7.500000)" fill="white" fill-opacity="0"/>
                        </clipPath>
                        <rect id="Frame 149286306" rx="4.500000" width="31.000000" height="31.000000"
                              transform="translate(0.500000 0.500000)" fill="#EFEFEF" fill-opacity="1.000000"/>
                        <rect id="Frame" rx="-0.500000" width="17.000000" height="17.000000"
                              transform="translate(7.500000 7.500000)" fill="#FFFFFF" fill-opacity="0"/>
                        <g clip-path="url(#clip127_32518)">
                            <path id="Vector"
                                  d="M17.5 13.75L14.5 13.75C14.3 13.75 14.11 13.82 13.96 13.96C13.82 14.11 13.75 14.3 13.75 14.5L13.75 17.5C13.75 17.69 13.82 17.88 13.96 18.03C14.11 18.17 14.3 18.25 14.5 18.25L17.5 18.25C17.69 18.25 17.88 18.17 18.03 18.03C18.17 17.88 18.25 17.69 18.25 17.5L18.25 14.5C18.25 14.3 18.17 14.11 18.03 13.96C17.88 13.82 17.69 13.75 17.5 13.75ZM16.75 16.75L15.25 16.75L15.25 15.25L16.75 15.25L16.75 16.75ZM22.75 16.75C22.94 16.75 23.13 16.67 23.28 16.53C23.42 16.38 23.5 16.19 23.5 16C23.5 15.8 23.42 15.61 23.28 15.46C23.13 15.32 22.94 15.25 22.75 15.25L21.25 15.25L21.25 13.75L22.75 13.75C22.94 13.75 23.13 13.67 23.28 13.53C23.42 13.38 23.5 13.19 23.5 13C23.5 12.8 23.42 12.61 23.28 12.46C23.13 12.32 22.94 12.25 22.75 12.25L21.11 12.25C21 11.93 20.82 11.64 20.58 11.41C20.35 11.17 20.06 10.99 19.75 10.88L19.75 9.25C19.75 9.05 19.67 8.86 19.53 8.71C19.38 8.57 19.19 8.5 19 8.5C18.8 8.5 18.61 8.57 18.46 8.71C18.32 8.86 18.25 9.05 18.25 9.25L18.25 10.75L16.75 10.75L16.75 9.25C16.75 9.05 16.67 8.86 16.53 8.71C16.38 8.57 16.19 8.5 16 8.5C15.8 8.5 15.61 8.57 15.46 8.71C15.32 8.86 15.25 9.05 15.25 9.25L15.25 10.75L13.75 10.75L13.75 9.25C13.75 9.05 13.67 8.86 13.53 8.71C13.38 8.57 13.19 8.5 13 8.5C12.8 8.5 12.61 8.57 12.46 8.71C12.32 8.86 12.25 9.05 12.25 9.25L12.25 10.88C11.93 10.99 11.64 11.17 11.41 11.41C11.17 11.64 10.99 11.93 10.88 12.25L9.25 12.25C9.05 12.25 8.86 12.32 8.71 12.46C8.57 12.61 8.5 12.8 8.5 13C8.5 13.19 8.57 13.38 8.71 13.53C8.86 13.67 9.05 13.75 9.25 13.75L10.75 13.75L10.75 15.25L9.25 15.25C9.05 15.25 8.86 15.32 8.71 15.46C8.57 15.61 8.5 15.8 8.5 16C8.5 16.19 8.57 16.38 8.71 16.53C8.86 16.67 9.05 16.75 9.25 16.75L10.75 16.75L10.75 18.25L9.25 18.25C9.05 18.25 8.86 18.32 8.71 18.46C8.57 18.61 8.5 18.8 8.5 19C8.5 19.19 8.57 19.38 8.71 19.53C8.86 19.67 9.05 19.75 9.25 19.75L10.88 19.75C10.99 20.06 11.17 20.35 11.41 20.58C11.64 20.82 11.93 21 12.25 21.11L12.25 22.75C12.25 22.94 12.32 23.13 12.46 23.28C12.61 23.42 12.8 23.5 13 23.5C13.19 23.5 13.38 23.42 13.53 23.28C13.67 23.13 13.75 22.94 13.75 22.75L13.75 21.25L15.25 21.25L15.25 22.75C15.25 22.94 15.32 23.13 15.46 23.28C15.61 23.42 15.8 23.5 16 23.5C16.19 23.5 16.38 23.42 16.53 23.28C16.67 23.13 16.75 22.94 16.75 22.75L16.75 21.25L18.25 21.25L18.25 22.75C18.25 22.94 18.32 23.13 18.46 23.28C18.61 23.42 18.8 23.5 19 23.5C19.19 23.5 19.38 23.42 19.53 23.28C19.67 23.13 19.75 22.94 19.75 22.75L19.75 21.11C20.06 21 20.35 20.82 20.58 20.58C20.82 20.35 21 20.06 21.11 19.75L22.75 19.75C22.94 19.75 23.13 19.67 23.28 19.53C23.42 19.38 23.5 19.19 23.5 19C23.5 18.8 23.42 18.61 23.28 18.46C23.13 18.32 22.94 18.25 22.75 18.25L21.25 18.25L21.25 16.75L22.75 16.75ZM19.75 19C19.75 19.19 19.67 19.38 19.53 19.53C19.38 19.67 19.19 19.75 19 19.75L13 19.75C12.8 19.75 12.61 19.67 12.46 19.53C12.32 19.38 12.25 19.19 12.25 19L12.25 13C12.25 12.8 12.32 12.61 12.46 12.46C12.61 12.32 12.8 12.25 13 12.25L19 12.25C19.19 12.25 19.38 12.32 19.53 12.46C19.67 12.61 19.75 12.8 19.75 13L19.75 19Z"
                                  fill="#323232" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </g>
                    </svg>
                </p>
            </div>
            <p className={styles.count}>{appState3 ? appState3.posts : "0"}</p>
            <div className={styles.bot}>
                <p className={styles.lastMouth}>за последний месяц</p>
                <div className={styles.botText}>
                    <svg width="16.000000" height="16.000000" viewBox="0 0 16 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip127_32495">
                            <rect id="icon/up" width="16.000000" height="16.000000"
                                  transform="translate(0.000000 -0.500000)" fill="white" fill-opacity="0"/>
                        </clipPath>
                        <rect id="icon/up" width="16.000000" height="16.000000"
                              transform="translate(0.000000 -0.500000)" fill="#FFFFFF" fill-opacity="0"/>
                        <g clip-path="url(#clip127_32495)">
                            <path id="Vector" d="M2 10.83L6 6.83L8.66 9.5L14 4.16" stroke="#016626"
                                  stroke-opacity="1.000000" stroke-width="1.500000" stroke-linejoin="round"
                                  stroke-linecap="round"/>
                            <path id="Vector" d="M9.33 4.16L14 4.16L14 8.83" stroke="#016626"
                                  stroke-opacity="1.000000"
                                  stroke-width="1.500000" stroke-linejoin="round" stroke-linecap="round"/>
                        </g>
                    </svg>
                    <p className={styles.countMouth}>+12</p>
                </div>
            </div>
        </div>
     
    </>
}