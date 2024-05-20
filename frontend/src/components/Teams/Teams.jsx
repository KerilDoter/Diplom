import styles from './Teams.module.css'
import {Team} from "./Team/Team";

export const Teams = () => {
    return <div className={styles.content}>
        <h2 className={styles.h2}>Команды</h2>
        <Team/>
    </div>
}