import styles from './Cards.module.css'
export const Cards = () => {
    const cards = [
        {
            id: 1,
            cardName: 'Идея "..."',
            cardImage: "https://avatars.dzeninfra.ru/get-zen_doc/3499786/pub_628bd224a70c7938bb360939_628bd31e21407a6901baea81/scale_1200",
            cardDescription: 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.',
            moderation: true,
        },
        {
            id: 2,
            cardName: 'Идея "..."',
            cardImage: 'https://img.freepik.com/premium-photo/wallpaper-desktop-4k_605905-3521.jpg',
            cardDescription: 'Существуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная).',
            moderation: false,
        },
        {
            id: 3,
            cardName: 'Идея "..."',
            cardImage: 'https://chelseablues.ru/images/news14/228c03bf904.jpg',
            cardDescription: 'В лингвистике термин «текст» используется в широком значении, включая и образцы устной речи. Восприятие текста изучается в рамках лингвистики текста и психолингвистики. ',
            moderation: true,
        },
        {
            id: 4,
            cardName: 'Идея "..."',
            cardImage: 'https://cs13.pikabu.ru/post_img/big/2023/11/12/8/1699791312112215299.png',
            cardDescription: 'В лингвистике термин «текст» используется в широком значении, включая и образцы устной речи. Восприятие текста изучается в рамках лингвистики текста и психолингвистики. ',
            moderation: false,
        },
        {
            id: 5,
            cardName: 'Идея "..."',
            cardImage: 'https://99px.ru/sstorage/53/2023/01/tmb_348279_239176.jpg',
            cardDescription: 'В лингвистике термин «текст» используется в широком значении, включая и образцы устной речи. Восприятие текста изучается в рамках лингвистики текста и психолингвистики. ',
            moderation: true,
        },
        {
            id: 6,
            cardName: 'Идея "..."',
            cardImage: 'https://www.passion.ru/thumb/1500x0/filters:quality(75):no_upscale()/imgs/2022/03/24/16/5323877/30c1e09df2ea3734f0635eb503b486865d338c36.jpg',
            cardDescription: 'В лингвистике термин «текст» используется в широком значении, включая и образцы устной речи. Восприятие текста изучается в рамках лингвистики текста и психолингвистики. ',
            moderation: true,
        },
    ]
    const moderatedCards = cards.filter(card => card.moderation === true);
    const listCards = moderatedCards.map((card) => {
        return <li className={styles.card} key={card.id}>
            <div className={styles.text}>
                <p className={styles.cardName}>{card.cardName}</p>
                <p className={styles.description}>{card.cardDescription}</p>
            </div>
            <div className={styles.blockImage} style={{
                backgroundImage: `url("${card.cardImage}")`
            }}>
            </div>
        </li>
    })
    return <div>
        <h2 className={styles.headingCard}>Идеи от наших студентов</h2>
        <div className={styles.cards}>
            <ul className={styles.list}>
                {listCards}
            </ul>
        </div>
    </div>
}