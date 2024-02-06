const confirmDelete = async (id) => {
    if (confirm("Tem certeza que deseja excluir este corretor?")) {
      try {
        const response = await fetch("process_form.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `id=${id}&action=delete`,
        });
  
        if (response.ok) {
            alert("Corretor Excluído com sucesso!");
          location.reload();
        } else {
          throw new Error("Falha ao excluir corretor!");
        }
      } catch (error) {
        console.error(error.message);
      }
    }
  };
  
