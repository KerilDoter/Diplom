import {HeaderOfCenter} from "./HeaderOfCenter/HeaderOfCenter";
import styles from './Center.module.css'
import {Cards} from "./Cards/Cards";

export const Center = () => {
    return <div className={styles.container}>
        <HeaderOfCenter/>
        <Cards/>
    </div>
}