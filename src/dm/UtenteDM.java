package dm;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import beans.UtenteBean;
import jdbc.DriverManagerConnectionPool;

public class UtenteDM {

	private final static String TABLE_NAME="UTENTE";


	public synchronized void insertUser(UtenteBean newUser) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String insertSQL = "INSERT INTO "+TABLE_NAME+" ( ID, EMAIL, CITTA, PASS)"+" VALUE (?,?,?,?)";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(insertSQL);
			preparedStatement.setString(1, newUser.getId());
			preparedStatement.setString(2, newUser.getEmail());
			preparedStatement.setString(3, newUser.getCitta());
			preparedStatement.setString(4, newUser.getPassword());
			preparedStatement.executeUpdate();

			connection.commit();

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}

	}

	public synchronized void deleteUser(int keyUtente) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String deleteSQL = "DELETE FROM "+TABLE_NAME+" WHERE KEYUTENTE= ?";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement= connection.prepareStatement(deleteSQL);
			preparedStatement.setInt(1, keyUtente);
			
			preparedStatement.executeUpdate();

			connection.commit();
		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}




	}

	public synchronized UtenteBean searchUser(String id) throws SQLException{
		UtenteBean user = null;
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String querySQL = "SELECT * FROM "+TABLE_NAME+" WHERE ID = ?";
		
		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement= connection.prepareStatement(querySQL);
			preparedStatement.setString(1, id );
			ResultSet rs = preparedStatement.executeQuery();
			
			while (rs.next()) {
				user = new UtenteBean();
				
				user.setKeyUtente(rs.getInt("KEYUTENTE"));
				user.setId(rs.getString("ID"));
				user.setEmail(rs.getString("EMAIL"));
				user.setCitta(rs.getString("CITTA"));
				user.setPassword(rs.getString("PASS"));
			}
			
			
		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}
		
		return user;
	}
	
	public synchronized void updateUser(UtenteBean user) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		
		String updateSQL = "UPDATE "+TABLE_NAME+" SET ID = ?, EMAIL = ?, CITTA = ? , PASS = ? WHERE KEYUTENTE = ? ";
		
		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(updateSQL);
			preparedStatement.setString(1, user.getId());
			preparedStatement.setString(2, user.getEmail());
			preparedStatement.setString(3, user.getCitta());
			preparedStatement.setString(4, user.getPassword());
			preparedStatement.setInt(5, user.getKeyUtente());
			preparedStatement.executeUpdate();
			
			connection.commit();
		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}
		
		
	}


}
