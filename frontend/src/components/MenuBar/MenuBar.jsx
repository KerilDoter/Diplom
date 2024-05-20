import styles from './MenuBar.module.css'
import {Routes} from "react-router";
import {NavLink} from "react-router-dom";
export const MenuBar = (icons) => {
    return <div className={styles.menu}>
            <ul className={styles.list}>
                {icons.icons.map((icon)=> {
                    return <li key={icon.id} className={styles.icon}><NavLink
                        className={({ isActive }) => isActive ? `${styles.active}` : ""}
                        to={icon.name}>{icon.src}</NavLink></li>
                })}
            </ul>

    </div>
}