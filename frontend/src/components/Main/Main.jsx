import styles from './Main.module.css'
import {Center} from "./Center/Center";
import {Right} from "./Right/Right";

export const Main = () => {
    return <div className={styles.container}>
        <Center/>
        <Right/>
    </div>
}