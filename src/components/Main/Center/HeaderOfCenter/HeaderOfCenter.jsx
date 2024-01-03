import styles from './HeaderOfCenter.module.css'
export const HeaderOfCenter = () => {
    return <div>
        <div style={{ backgroundImage: "url(/bgMainCenterHeader.jpg)" }} className={styles.wrapper}>
            <p className={styles.text}>Системма Управления Идеями</p>
        </div>
    </div>
}