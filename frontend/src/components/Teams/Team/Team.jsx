import styles from './Team.module.css'
export const Team = () => {
    return <div className={styles.blocks}>
        <div className={styles.block1}>
            <p className={styles.header}>TeamBobrKurwa</p>
            <p className={styles.desc}>Команда бобров, которая проектирует то, что никто не сможет спроектировать</p>
            <a href="#" className={styles.btn}>
                <p className={styles.name}>
                    Подать заявку
                </p>
            </a>
        </div>
        <div>
            <div className={styles.table}>
                <p className={styles.text}>Автор</p>
                <p className={styles.text}>Роль</p>
            </div>
            <div className={styles.border}></div>
           <div className={styles.table}>
               <div className={styles.footInfo}>
                   <img className={styles.image}
                        src="https://otkrit-ka.ru/uploads/posts/2023-04/otkrit-ka.ru_foto-otkrytki-belki-na-avu-1.jpg"
                        alt="avatar"/>
                   <div>
                       <p className={styles.topText}>Унанян Виталий Сергеевич</p>
                       <p className={styles.botText}>@Nixyaka</p>
                   </div>
               </div>
               <div className={styles.footInfo}>
                   <p className={styles.topText}>Создатель</p>
               </div>
           </div>
        </div>
    </div>
}