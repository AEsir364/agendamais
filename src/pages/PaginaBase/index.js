import BarraLateral from "../../components/BarraLateral";
import Header from "../../components/Header";
import { Outlet } from "react-router-dom";

function PaginaBase() {
    return (
        <main>
            <BarraLateral />
            <Header />
            <Outlet />
        </main>
    )
}

export default PaginaBase;