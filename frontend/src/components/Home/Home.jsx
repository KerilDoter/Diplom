import styles from "../App.module.css";
import {Header} from "../Header/Header";
import {IdeasCount} from "../IdeasCount/IdeasCount";
import {News} from "../News/News";
import React from "react";

export const Home = () => {

        return (
            <div className={styles.content}>
                <IdeasCount/>
                <News />
            </div>
        );
}