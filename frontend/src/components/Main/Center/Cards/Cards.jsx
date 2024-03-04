import styles from './Cards.module.css'
import { useEffect, useState  } from 'react';
import {Form} from "./Form/Form"
export const Cards = () => {

    const [appState, setAppState] = useState();
    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/", {
          method: "GET",
        })
          .then((response) => response.json())
          .then((data) => {
            setAppState(data);
            console.log(data);
          })
          .catch((error) => console.log(error));
      }, []);


    //const moderatedCards = appState.filter(card => card.moderation === true);
    const listCards = appState?.map((card) => {
        return <li className={styles.card} key={card.id}>
            <div className={styles.blockImage} style={{
                backgroundImage: `url("https://kubsau.ru/100/dist/img/congrats.png")`
            }}>
            </div>
            <div className={styles.text}>
                <p className={styles.cardName}>{card.cardName}</p>
                <p className={styles.description}>{card.cardDescription}</p>
            </div>
            {/*<div className={styles.blockImage} style={{*/}
            {/*    backgroundImage: `url("${card.cardImage}")`*/}
            {/*}}>*/}
            {/*</div>*/}
        </li>
    })
    return <div>
        <h2 className={styles.headingCard}>Идеи от наших студентов</h2>
        <h3>Добавить идею</h3>
        <Form />
        <div className={styles.cards}>
            <ul className={styles.list}>
                {listCards}
            </ul>
        </div>
    </div>
}