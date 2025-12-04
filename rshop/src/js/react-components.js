import React, { useState } from 'react';

// Пример простого React-компонента, который может быть использован в будущем
export const ExampleComponent = ({ title = 'Пример компонента' }) => {
  const [count, setCount] = useState(0);
  
  return (
    <div className="rshop-react-component">
      <h3>{title}</h3>
      <p>Счетчик: {count}</p>
      <button onClick={() => setCount(count + 1)}>
        Увеличить
      </button>
    </div>
  );
};

// Здесь можно будет добавлять другие React-компоненты 