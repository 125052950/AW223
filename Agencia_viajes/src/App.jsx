import { useState } from 'react';
import { DESTINOS_ESTATICOS } from './components/destinos';
import './App.css';

export default function App() {
  const [busqueda, setBusqueda] = useState('');
  const [categoriaActiva, setCategoriaActiva] = useState('Todas');
  const [favoritos, setFavoritos] = useState([]);
  const [soloFavoritos, setSoloFavoritos] = useState(false);
  const [destinoSeleccionado, setDestinoSeleccionado] = useState(null);

  const toggleFavorito = (id) => {
    setFavoritos((prev) =>
      prev.includes(id) ? prev.filter((favId) => favId !== id) : [...prev, id]
    );
  };

  const abrirDetalles = (destino) => {
    setDestinoSeleccionado(destino);
  };

  const cerrarDetalles = () => {
    setDestinoSeleccionado(null);
  };

  const destinosFiltrados = DESTINOS_ESTATICOS.filter((destino) => {
    const termino = busqueda.trim().toLowerCase();
    const coincideTexto =
      destino.nombre.toLowerCase().includes(termino) ||
      destino.pais.toLowerCase().includes(termino) ||
      destino.categoria.toLowerCase().includes(termino);

    const coincideCategoria =
      categoriaActiva === 'Todas' || destino.categoria === categoriaActiva;

    const coincideFavoritos = soloFavoritos
      ? favoritos.includes(destino.id)
      : true;

    return coincideTexto && coincideCategoria && coincideFavoritos;
  });

  return (
    <div className="app">
      <header className="navbar">
        <div className="navbar-logo">
          <span>TravelApp</span>
        </div>

        <nav className="navbar-links">
          <a href="#" className="nav-btn">Inicio</a>
          <a href="#destinos" className="nav-btn">Destinos</a>
          <a href="#favoritos" className="nav-btn">Favoritos</a>
        </nav>
      </header>

      <main className="container">
        <section className="hero-banner">
          <h1>Descubre tu próximo destino</h1>
          <p>Explora lugares increíbles y planea tus próximas vacaciones.</p>
        </section>

        <section className="favorites-summary">
          <div>
            <h2>Destinos favoritos</h2>
            <p>Tu próxima aventura comienza aquí.</p>
          </div>
          <span className="favorites-count" aria-live="polite">
            {favoritos.length}
          </span>
        </section>

        <section className="explore-section">
          <h2 id="destinos">Explora destinos turísticos</h2>

          <div className="search-wrapper">
            <input
              type="text"
              className="search-input"
              placeholder="Buscar destino turístico..."
              value={busqueda}
              onChange={(e) => setBusqueda(e.target.value)}
            />
          </div>

          <div className="controls-bar">
            <button
              type="button"
              id="favoritos"
              className={`btn-primary ${soloFavoritos ? 'btn-active-filter' : ''}`}
              onClick={() => setSoloFavoritos((prev) => !prev)}
            >
              {soloFavoritos ? 'Mostrar todos' : 'Mostrar favoritos'}
            </button>
          </div>
        </section>

        <section className="cards-grid">
          {destinosFiltrados.length > 0 ? (
            destinosFiltrados.map((destino) => {
              const esFavorito = favoritos.includes(destino.id);

              return (
                <article key={destino.id} className="card">
                  <img
                    src={destino.imagen}
                    alt={destino.nombre}
                    className="card-image"
                  />
                  <div className="card-body">
                    <span className="badge">{destino.categoria}</span>
                    <h3 className="card-title">{destino.nombre}</h3>
                    <p className="card-location">
                      <span aria-hidden="true">📍</span>
                      {destino.pais}
                    </p>
                    <p className="card-price">
                      Desde {destino.precioFormateado}
                    </p>

                    <div className="card-actions">
                      <button
                        type="button"
                        className={`btn-fav ${esFavorito ? 'active' : ''}`}
                        onClick={() => toggleFavorito(destino.id)}
                      >
                        {esFavorito ? '♥ En favoritos' : '♡ Agregar favorito'}
                      </button>
                      <button
                        type="button"
                        className="btn-primary"
                        onClick={() => abrirDetalles(destino)}
                      >
                        Ver detalles
                      </button>
                    </div>
                  </div>
                </article>
              );
            })
          ) : (
            <div className="empty-state">
              <p>No hay destinos que coincidan con los filtros actuales.</p>
            </div>
          )}
        </section>
      </main>

      {destinoSeleccionado && (
        <div className="modal-overlay" onClick={cerrarDetalles}>
          <div
            className="modal-content"
            role="dialog"
            aria-modal="true"
            aria-labelledby="modal-title"
            onClick={(e) => e.stopPropagation()}
          >
            <button
              type="button"
              className="modal-close"
              onClick={cerrarDetalles}
              aria-label="Cerrar modal"
            >
              ✕
            </button>

            <img
              src={destinoSeleccionado.imagen}
              alt={destinoSeleccionado.nombre}
              className="modal-image"
            />

            <div className="modal-body">
              <span className="badge">{destinoSeleccionado.categoria}</span>
              <h2 id="modal-title" className="modal-title">
                {destinoSeleccionado.nombre}
              </h2>
              <p className="card-location">
                <span aria-hidden="true">📍</span>
                {destinoSeleccionado.pais}
              </p>

              <p className="modal-description">
                {destinoSeleccionado.descripcion ||
                  'Descubre paisajes únicos, cultura local y experiencias inolvidables en este destino.'}
              </p>

              <div className="modal-footer">
                <span className="modal-price">
                  Desde {destinoSeleccionado.precioFormateado}
                </span>

                <div className="card-actions">
                  <button
                    type="button"
                    className={`btn-fav ${
                      favoritos.includes(destinoSeleccionado.id) ? 'active' : ''
                    }`}
                    onClick={() => toggleFavorito(destinoSeleccionado.id)}
                  >
                    {favoritos.includes(destinoSeleccionado.id)
                      ? '♥ En favoritos'
                      : '♡ Favorito'}
                  </button>
                  <button
                    type="button"
                    className="btn-primary"
                    onClick={cerrarDetalles}
                  >
                    Cerrar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}