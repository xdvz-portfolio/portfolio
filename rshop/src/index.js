// Минимальная версия для тестирования

// Импорт стилей
import './style.scss';

// Импорт JavaScript
import './js/main.js';

// Подготавливаем все для будущей работы с React
// Эта часть не будет использоваться немедленно, но настраивает базу для будущих задач
import React from 'react';
import ReactDOM from 'react-dom/client';

// Функция для инициализации React компонентов на странице
window.initReactComponents = (selector, Component, props = {}) => {
  const container = document.querySelector(selector);
  if (container) {
    const root = ReactDOM.createRoot(container);
    root.render(React.createElement(Component, props));
  }
};

