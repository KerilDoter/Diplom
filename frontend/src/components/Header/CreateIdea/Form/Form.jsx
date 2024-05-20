import { useState, useEffect } from "react";
import styles from './Form.module.css';

export const Form = ({toggleVisible}) => {
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState('');
    const [content, setContent] = useState('');
  const [category_id, setCategory_id] = useState('');
  const [categories, setCategories] = useState([]);
    const [attachment_id, setAttachment_id] = useState('');
    const [error, setError] = useState(null);


    const handleSubmit = (e) => {
        e.preventDefault();
        const token = localStorage.getItem('token');
        if (!token) {
            setError('No token found');
            return;
        }

        fetch('http://127.0.0.1:8000/api/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Authorization: `Bearer ${token}`, // Sending token in the request header
            },
            body: JSON.stringify({ title, description, content, category_id: category_id, attachment_id}),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then((responseData) => {
                // Handling the server response
                console.log('Idea created successfully:', responseData);
                // Additional actions on successful idea creation
            })
            .catch((error) => {
                console.error('Error creating idea:', error);
                setError('Error creating idea');
                // Additional actions in case of error
            });
    };

    const [categoryState, setCategoryState] = useState([]);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/category", {
          method: "GET",
        })
          .then((response) => response.json())
          .then((data) => {
            setCategories(data);
          })
          .catch((error) => console.log(error));
      }, []);


    return <> {
        <form onSubmit={handleSubmit} className={styles.form}>
        <a href="#" onClick={toggleVisible}>x</a>
        <label htmlFor="title" className={styles.label}>Заголовок</label>
        <input type="text" className={styles.input} id="title" value={title} onChange={(e) => setTitle(e.target.value)} />

        <label htmlFor="description" className={styles.label}>Краткое описание</label>
        <textarea className={styles.input} id="description" value={description} onChange={(e) => setDescription(e.target.value)} />

        <label htmlFor="content" className={styles.label}>Содержание</label>
        <textarea className={styles.input} id="content" value={content} onChange={(e) => setContent(e.target.value)} />

        <label htmlFor="category_id" className={styles.label}>Выберите категорию поста</label>
        {/* <textarea id="category_id" value={category_id} onChange={(e) => setCategory_id(e.target.value)} /> */}
        <select id="category_id" name="category_id" value={category_id} onChange={(e) => setCategory_id(e.target.value)}>
    {categories.map((category) => (
        <option key={category.id} value={category.id}>
            {category.title}
        </option>
    ))}
</select>

        <label htmlFor="attachment_id"className={styles.label}> Приложите файл</label>
        <textarea className={styles.input} id="attachment_id" value={attachment_id} onChange={(e) => setAttachment_id(e.target.value)} />

        {error && <p className={styles.error}>{error}</p>}

        <button type="submit" className={styles.btn} onSubmit={toggleVisible}>Создать пост</button>
    </form>
    }
        </>
};