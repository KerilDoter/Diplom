import styles from './Ideas.module.css'
import {useState} from "react";

export const Ideas = () => {
    const ideas = ['idea1', 'idea2', 'idea3']
    const listIdeas = ideas.map((idea) => {
        return <li className={styles.idea} key={idea.id}>{idea}</li>
    })
    const [isVisible, setIsVisible] = useState(false)
    const toggleVisible = () => {
        setIsVisible((prevVisible) => !prevVisible)
    }
    return <div>
        <div onClick={toggleVisible} className={styles.heading}>
            <h2>Ideas</h2>
        </div>
        {isVisible && <ul className={styles.list}>
            {listIdeas}
        </ul>}
    </div>
}